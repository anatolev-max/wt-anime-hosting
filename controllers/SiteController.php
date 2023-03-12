<?php

namespace app\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public $mainClass;

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionView(): string
    {
        $this->mainClass = 'container main-page__container';

        return $this->render('view');
    }
}