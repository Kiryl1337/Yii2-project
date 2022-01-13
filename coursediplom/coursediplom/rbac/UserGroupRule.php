<?php
namespace app\rbac;

use app\models\User;
use yii\helpers\ArrayHelper;
use yii\rbac\Rule;

class UserGroupRule extends Rule
{
    public $name = 'userRole'; //название данного правила
    /*
     * $user - id текущего пользователя
     * $item - объект роли которую проверяем у текущего пользователя
     * $params - параметры, которые можно передать для проведеня проверки в данный класс
     */
    public function execute($user, $item, $params)
    {
        //Получаем объект текущего пользователя из базы
        $user = ArrayHelper::getValue($params, 'user', User::findOne($user));

        if ($user) {
            $role = $user->role;

            if ($item->name === 'admin') {
                return $role == User::ROLE_ADMIN;
            }
            elseif ($item->name === 'teacher') {
                return $role == User::ROLE_ADMIN || $role == User::ROLE_TEACHER;
            }
            elseif ($item->name === 'student') {
                return  $role == User::ROLE_STUDENT;
            }
        }

        return false;
    }
}