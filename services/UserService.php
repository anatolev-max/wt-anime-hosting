<?php

namespace app\services;

use app\models\forms\SignupForm;
use app\models\User;
use Yii;

class UserService
{
    /**
     * @param SignupForm $model
     * @return bool
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
}