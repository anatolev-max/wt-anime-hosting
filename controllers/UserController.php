<?php

namespace app\controllers;

use app\models\forms\LoginForm;
use app\models\forms\SignupForm;
use app\models\User;
use app\services\UserService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class UserController extends Controller
{
    public string $mainClass = 'container main-page__container';

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'actions' => ['signup', 'login'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                ]
            ]
        ];
    }

    public function actionSignup(): Response|string
    {
        $signupForm = new SignupForm();

        if (Yii::$app->request->isPost) {
            $signupForm->load(Yii::$app->request->post());
            $signupForm->avatar = UploadedFile::getInstance($signupForm, 'avatar');

            if ($signupForm->validate() && (new UserService())->create($signupForm)) {
                $message = $signupForm->login . ', вы успешно зарегистрировали аккаунт!';
                Yii::$app->session->setFlash('success', $message);

                return $this->redirect(['user/login']);
            }
        }

        return $this->render('signup', [
            'model' => $signupForm
        ]);
    }

    public function actionLogin(): Response|string
    {
        $loginForm = new LoginForm();

        if (Yii::$app->request->isPost) {
            $loginForm->load(Yii::$app->request->post());

            if ($loginForm->validate()) {
                Yii::$app->user->login(User::findOne(['login' => $loginForm->login]));

                return $this->goHome();
            }
        }

        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}