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
<?= Alert::widget() ?>
<section>
    <h2 class="form__title">Вход</h2>
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['user/login']),
        'options' => [
            'class' => 'form',
            'novalidate' => true,
            'autocomplete' => 'off',
        ],
        'fieldConfig' => [
            'options' => ['class' => 'mb-3'],
            'errorOptions' => ['class' => 'form-text help-block']
        ],
    ]); ?>

        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        <p>Ещё нет аккаунта? <a href="login.php">Зарегистрируйтесь</a></p>

    <?php ActiveForm::end(); ?>
</section>
