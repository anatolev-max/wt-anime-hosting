<?php

/** @var yii\web\View $this */
/** @var app\models\Post[] $posts */

use app\assets\IndexAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name . ' | Главная';

IndexAsset::register($this);

?>
<div class="container">
    <section class="catalog">
        <h2 class="catalog__title">Аниме</h2>
        <p class="catalog__subtitle">На данной странице отображены аниме</p>
        <div class="catalog__wrapper">

            <?php foreach ($posts ?? [] as $post): ?>
                <a href="<?= Url::to(['site/view', 'postId' => $post->id]) ?>" class="catalog__item">
                    <img src="/img/<?= Html::encode($post->image_path) ?>" alt='Фото аниме' class="catalog__item-img">
                    <p class="catalog__item-title"><?= Html::encode($post->title) ?></p>
                    <div class="catalog__item-wrapper">
                        <p class="catalog__item-type"><?= Html::encode($post->type->name) ?></p>
                        <p class="catalog__item-year"><?= Html::encode($post->year) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>
    </section>
</div>
