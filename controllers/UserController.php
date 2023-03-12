<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class UserController extends Controller
{
    public $mainClass = 'container main-page__container';

    public function actionSignup(): string
    {
        return $this->render('signup');
    }

    public function actionLogin(): string
    {
        return $this->render('login');
    }

    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}