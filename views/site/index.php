<?php

/** @var yii\web\View $this */

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
                <a href='post.html' class="catalog__item">
                    <img src="img/1.jpg" alt='Фото аниме' class="catalog__item-img">
                    <p class="catalog__item-title">Стальной алхимик</p>
                    <div class="catalog__item-wrapper">
                        <p class="catalog__item-type">TV сериал</p>
                        <p class="catalog__item-year">2002</p>
                    </div>
                </a>
            <?php endforeach; ?>

            <a href='post.html' class="catalog__item">
                <img src="img/1.jpg" alt='Фото аниме' class="catalog__item-img">
                <p class="catalog__item-title">Стальной алхимик</p>
                <div class="catalog__item-wrapper">
                    <p class="catalog__item-type">TV сериал</p>
                    <p class="catalog__item-year">2002</p>
                </div>
            </a>
            <a href='post.html' class="catalog__item">
                <img src="img/1.jpg" alt='Фото аниме' class="catalog__item-img">
                <p class="catalog__item-title">Стальной алхимик</p>
                <div class="catalog__item-wrapper">
                    <p class="catalog__item-type">TV сериал</p>
                    <p class="catalog__item-year">2002</p>
                </div>
            </a>

        </div>
    </section>
</div>
