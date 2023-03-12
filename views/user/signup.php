<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use app\assets\LoginAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name . ' | Регистрация';

LoginAsset::register($this);

?>
<section>
    <h2 class="form__title">Регистрация</h2>
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['user/signup']),
        'options' => [
            'class' => 'form',
            'novalidate' => true,
            'autocomplete' => 'off'
        ],
        'fieldConfig' => [
            'options' => ['class' => 'mb-3'],
            'errorOptions' => ['class' => 'form-text']
        ],
    ]); ?>

        <?= $form->field($model, 'login')->textInput() ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
        <?= $form->field($model, 'email')->textInput() ?>
        <?= $form->field($model, 'avatar')->fileInput() ?>
        <?= $form->field($model, 'age')->input('number', ['min' => 14, 'max' => 100]) ?>

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</section>
