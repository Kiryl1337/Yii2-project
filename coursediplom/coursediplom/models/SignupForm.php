<?php
namespace app\models;

use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $FIO;
    public $is_teacher;
    public $id_group;
    public $id_department;
    public $username;
    public $email;
    public $password;
    public $confirm_password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['FIO', 'trim'],
            ['FIO', 'required'],
            ['FIO', 'string', 'min' => 3, 'max' => 255],

            ['is_teacher', 'boolean'],

            ['id_group', 'trim'],
            ['id_group', 'required'],
            ['id_group', 'string'],

            ['id_department', 'trim'],
            ['id_department', 'required'],
            ['id_department', 'string'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот email уже занят.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['confirm_password', 'required'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают.'],
            ['confirm_password', 'string', 'min' => 6],

            ['status','default','value'=>User::STATUS_BLOCKED,'on'=>'emailActivation']
        ];
    }

    public function attributeLabels()
    {
        return [
            'FIO' => 'ФИО',
            'username' => 'Логин',
            'is_teacher'=>'Вы преподаватель?',
            'password' => 'Пароль',
            'confirm_password' => 'Подтверждение пароля',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->FIO = $this->FIO;
        $user->is_teacher = $this->is_teacher;
        if($this->is_teacher==1){
            $user->role='teacher';
            $user->id_group=null;
            $user->id_department = $this->id_department;
        }else {
            $user->role = 'student';
            $user->id_group = $this->id_group;
            $user->id_department=null;
        }
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailConfirmToken();
        $user->status = User::STATUS_WAIT_EMAIL;

        if ($user->save()) {
            Yii::$app->mailer->compose(['html' => '@app/mail/emailConfirm-html', 'text' => '@app/mail/emailConfirm-text'], ['user' => $user])
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setTo($user->email)
                ->setSubject('Подтверждение электронной почты для ' . Yii::$app->name)
                ->send();
            return $user;
        }

        if(!$user->save()){
            throw new \RuntimeException('Saving error.');
        }

        return $user;
    }
}
