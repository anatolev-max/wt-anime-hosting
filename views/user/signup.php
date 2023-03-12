<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use app\assets\LoginAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Alert;

$this->title = Yii::$app->name . ' | Регистрация';

LoginAsset::register($this);

?>
<section>
    <h2 class="form__title">Регистрация</h2>
    <form class="form">
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" class="form-control" id="login" aria-describedby="loginHelp">
            <div id="loginHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password">
            <div id="passwordHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="passwordRepeat" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" id="passwordRepeat">
            <div id="passwordRepeatHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            Сюда надо вставить каптчу, я не знаю как это делается
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
        <p>Уже есть аккаунт? <a href="login.php">Войдите</a></p>
    </form>
</section>
