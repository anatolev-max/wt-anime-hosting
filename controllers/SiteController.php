<?php

namespace app\controllers;

use app\models\Post;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public $user;
    public $mainClass;

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
        $posts = Post::find()->all();

        return $this->render('index', [
            'posts' => $posts
        ]);
    }

    public function actionView(int $post_id): string
    {
        if (!$post = Post::findOne($post_id)) {
            throw new NotFoundHttpException();
        }

        $this->user = User::findOne(Yii::$app->user->id);
        $this->mainClass = 'container main-page__container';

        return $this->render('view', [
            'post' => $post
        ]);
    }
}