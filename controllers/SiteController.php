<?php

namespace app\controllers;

use app\models\forms\CommentForm;
use app\models\Post;
use app\models\User;
use app\services\CommentService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

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

    public function actionView(int $post_id): Response|string
    {
        if (!$post = Post::findOne($post_id)) {
            throw new NotFoundHttpException();
        }

        $commentForm = new CommentForm();
        if ($commentForm->load(Yii::$app->request->post())) {
            if ($commentForm->validate()) {
                (new CommentService())->create($commentForm);
                return $this->refresh();
            }
        }

        $this->user = User::findOne(Yii::$app->user->id);
        $this->mainClass = 'container main-page__container';

        return $this->render('view', [
            'model' => $commentForm,
            'post' => $post,
        ]);
    }
}