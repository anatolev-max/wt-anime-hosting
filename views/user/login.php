<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use app\assets\LoginAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Alert;

$this->title = Yii::$app->name . ' | Вход';

LoginAsset::register($this);

?>
<section>
    <h2 class="form__title">Вход</h2>
    <form class="form">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text help-block"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
            <div id="emailHelp" class="form-text help-block"></div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
        <p>Ещё нет аккаунта? <a href="login.php">Зарегистрируйтесь</a></p>
    </form>
</section>