<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;


class EmailConfirmForm extends Model
{
    private $_user;

    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Отсутствует код подтверждения.');
        }
        $this->_user = User::findByEmailConfirmToken($token);
        if (!$this->_user) {
            throw new InvalidParamException('Неверный токен.');
        }
        parent::__construct($config);
    }

    public function confirmEmail()
    {
        $user = $this->_user;
        $user->status = User::STATUS_WAIT_ADMIN_ACCESS;
        $user->removeEmailConfirmToken();

        return $user->save();
    }
}