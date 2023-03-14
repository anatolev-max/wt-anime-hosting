<?php

namespace app\services;

use app\models\forms\SignupForm;
use app\models\User;
use Yii;
use yii\base\Exception;

class UserService
{
    /**
     * @param SignupForm $model
     * @return bool
     * @throws Exception
     */
    public function create(SignupForm $model): bool
    {
        $user = new User();

        $user->login = $model->login;
        $user->password_hash = Yii::$app->security->generatePasswordHash($model->password);
        $user->age = $model->age;
        $user->email = $model->email;

        $filePath = uniqid("{$model->avatar->baseName}_") . '.' . $model->avatar->extension;
        $model->avatar->saveAs('uploads/avatars/' . $filePath);
        $user->avatar_path = $filePath;

        return $user->save();
    }

    /**
     * @param array $data
     * @return bool
     * @throws Exception
     */
    public function dc_create(array $data): bool
    {
        $user = new User();

        $user->login = $data['login'];
        $user->password_hash = Yii::$app->security->generatePasswordHash($data['password']);
        $user->age = $data['age'];
        $user->email = $data['email'];
        $user->avatar_path = $data['avatar_path'];

        return $user->save();
    }
}