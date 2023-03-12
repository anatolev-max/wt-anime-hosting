<?php

/** @var yii\web\View $this */

use app\assets\ViewAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name . ' | Публикация';

ViewAsset::register($this);

?>
<section class="sidebar">
    <div class="sidebar__inner">
        <h2 class="anime__title">Стальной алхимик</h2>
        <img class="anime__avatar" src="/img/1.jpg" alt="">
    </div>
</section>
<section class="anime-info">
    <div class="anime-info__wrapper">
        <div class="info">
            <h3 class="anime-info__title visually-hidden">Информация</h3>
            <dl>
                <dt>Тип:</dt><dd>TV сериал</dd>
                <dt>Эпизодов:</dt><dd>24</dd>
                <dt>Длительность эпизода:</dt><dd>24 м.</dd>
            </dl>
        </div>
        <div class="rating">
            <h3 class="anime-info__title visually-hidden">Рейтинг</h3>
            <dl>
                <dt>Средний рейтинг:</dt><dd>4.3</dd>
            </dl>
            <a class="rating__button" href="">Оставить отзыв</a>
        </div>
    </div>
    <p class="info__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sapiente sint reprehenderit fugiat quaerat nobis expedita vero, et odit culpa tempora id. Exercitationem aliquid harum molestiae enim quis consectetur inventore?</p>
    <video class="info__video" src=""></video>
</section>
<section class="comment">
    <h2 class="comment__title">Комментарии</h2>
    <div class="mb-3">
        <label for="comment" class="form-label">Введите свой комментарий:</label>
        <textarea class="form-control" id="comment" rows="3"></textarea>
    </div>
    <div class="comment__wrapper">
        <div class="comment__item">
            <div class="comment__info">
                <img class="comment__author-image" src="" alt="Аватар автора">
                <span class="comment__author-name">Иван Иванов</span>
                <span class="comment__date">13.02.2023</span>
            </div>
            <p class="comment__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim saepe adipisci dignissimos facere soluta, iste consequatur ipsam, reprehenderit sit cupiditate quidem ab? Distinctio provident possimus dolore. Dolorum eius veritatis fugit.</p>
        </div>
    </div>
</section>
