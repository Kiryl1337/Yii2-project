<?php
namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $FIO
 * @property string $is_teacher
 * @property string $id_group
 * @property string $id_department
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $email_confirm_token
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $role
 *
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_BLOCKED = 0;
    const STATUS_WAIT_EMAIL = 5;
    const STATUS_WAIT_ADMIN_ACCESS = 6;
    const STATUS_ACTIVE = 10;
    const ROLE_STUDENT = 'student';
    const ROLE_TEACHER= 'teacher';
    const ROLE_ADMIN = 'admin';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
	
	 public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }
 
    public static function getStatusesArray()
    {
        return [
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_WAIT_EMAIL => 'Ожидает подтверждения Email',
            self::STATUS_WAIT_ADMIN_ACCESS => 'Ожидает подтверждения администратора',
        ];
    }

    public function getRoleName()
    {
        return ArrayHelper::getValue(self::getRolesArray(), $this->role);
    }

    public static function getRolesArray()
    {
        return [
            self::ROLE_STUDENT => 'Студент',
            self::ROLE_TEACHER => 'Преподаватель',
            self::ROLE_ADMIN => 'Администратор',
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'status'], 'required'],
            [['id_group','id_department', 'is_teacher', 'status', 'created_at', 'updated_at'], 'integer'],
            [['FIO'], 'string', 'max' => 150],
            [['username', 'password_hash', 'password_reset_token', 'email', 'email_confirm_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['role'], 'string', 'max' => 50],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],
        ];
    }
	
	 /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FIO' => 'ФИО',
            'username' => 'Логин',
            'id_group' => 'Группа',
            'is_teacher' => 'Это преподаватель?',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлён',
            'groupName' => 'Группа',
            'role'=>'Роль',
        ];
    }
	
	public static function getIsTeacherList(){
        return ['Нет','Да'];
    }

    public function getIsTeacherName(){
        $list=self::getIsTeacherList();
        return $list($this->is_teacher);
    }

    public function getGroup()
    {
        return $this->hasOne(Group::className(),['id'=>'id_group']);
    }
    public function getDepartment()
    {
        return $this->hasOne(Department::className(),['id'=>'id_department']);
    }

    public function getDepartmentName()
    {
        return (isset($this->department))? $this->department->department_name: 'Не задан';
    }

    public function getGroupName()
    {
        return (isset($this->group))? $this->group->name: 'Не задана';
    }

    public static function getListTeacher(){
        return ArrayHelper::map(self::find()->andWhere('is_teacher=1')->all(),'id','FIO');
    }

    public static function getListStudent(){
        return ArrayHelper::map(self::find()->andWhere('is_teacher=0')->all(),'id','FIO');
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function findByEmailConfirmToken($email_confirm_token)
    {
        return static::findOne(['email_confirm_token' => $email_confirm_token, 'status' => self::STATUS_WAIT_EMAIL]);
    }


    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }


    public function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }

}
