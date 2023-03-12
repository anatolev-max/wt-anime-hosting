<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $login;
    public $password;
    public $password_repeat;
    public $email;
    public $age;
    public $avatar;

    public function rules(): array
    {
        return [
            [['login'], 'trim'],
            [['login'], 'required'],
            [['login'], 'string', 'max' => 128],
            [['login'], 'unique', 'targetClass' => User::class],

            [['password'], 'trim'],
            [['password'], 'required'],
            [['password'], 'string', 'length' => [6, 128]],

            [['password_repeat'], 'trim'],
            [['password_repeat'], 'required'],
            [['password_repeat'], 'string', 'max' => 128],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],

            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'string', 'max' => 128],
            [['email'], 'email'],

            [['age'], 'trim'],
            [['age'], 'required'],
            [['age'], 'integer', 'min' => 14, 'max' => 100],

            [['avatar'], 'required'],
            [['avatar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, jpeg, png'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пароля',
            'email' => 'Email',
            'age' => 'Возраст',
            'avatar' => 'Фото канала',
        ];
    }
}