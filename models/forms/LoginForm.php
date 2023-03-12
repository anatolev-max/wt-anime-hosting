<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Model;

class LoginForm extends Model
{
    public $login;
    public $password;

    public function rules(): array
    {
        return [
            [['login'], 'trim'],
            [['login'], 'required'],

            [['password'], 'trim'],
            [['password'], 'required'],
            [['password'], 'validatePassword'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = User::findOne(['login' => $this->login]);
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильный логин или пароль');
            }
        }
    }
}