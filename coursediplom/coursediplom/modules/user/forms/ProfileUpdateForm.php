<?php


namespace app\modules\user\forms;

use app\models\User;
use Yii;
use yii\base\Model;

class ProfileUpdateForm extends Model
{
    public $id_group;
    public $id_department;

    /**
     * @var User
     */
    private $_user;

    public function __construct(User $user, $config = [])
    {
        if(Yii::$app->user->identity->role=='student'){
            $this->_user = $user;
            $this->id_group = $user->id_group;
        } else if(Yii::$app->user->identity->role=='teacher'){
            $this->_user = $user;
            $this->id_department = $user->id_department;
        }

        parent::__construct($config);
    }

    public function rules()
    {
        return [
            ['id_group', 'trim'],
            ['id_group', 'string'],

            ['id_department', 'trim'],
            ['id_department', 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id_group' => 'Группа',
            'id_department' => 'Кафедра',
        ];
    }

    public function update()
    {
        if ($this->validate()) {
            if(Yii::$app->user->identity->role=='student'){
                $user = $this->_user;
                $user->id_group = $this->id_group;
                return $user->save();
            } if(Yii::$app->user->identity->role=='teacher'){
                $user = $this->_user;
                $user->id_department = $this->id_department;
                return $user->save();
            }
        } else {
            return false;
        }
    }
}