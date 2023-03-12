<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class SiteController extends Controller
{
    public $user;

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['?', '@']
                    ],
                ]
            ]
        ];
    }

    public function actionIndex(): string
    {
        $this->user = User::findOne(Yii::$app->user->id);

        return $this->render('index');
    }

    public function actionView(): string
    {
        $this->user = User::findOne(Yii::$app->user->id);
        $this->mainClass = 'container main-page__container';

        return $this->render('view');
    }
}