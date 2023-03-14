<?php

/** @var yii\web\View $this */
/** @var app\models\Post $post */

use app\assets\ViewAsset;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name . ' | Публикация';

ViewAsset::register($this);

?>
<section class="sidebar">
    <div class="sidebar__inner">
        <h2 class="anime__title"><?= Html::encode($post->title) ?></h2>
        <img class="anime__avatar" src="/img/<?= Html::encode($post->image_path) ?>" alt="">
    </div>
</section>
<section class="anime-info">
    <div class="anime-info__wrapper">
        <div class="info">
            <h3 class="anime-info__title visually-hidden">Информация</h3>
            <dl>
                <dt>Тип:</dt>
                <dd><?= Html::encode($post->type->name) ?></dd>

                <dt>Эпизодов:</dt>
                <dd><?= Html::encode($post->episode_count) ?></dd>

                <dt>Длительность эпизода:</dt>
                <dd><?= Html::encode($post->episode_duration) ?></dd>
            </dl>
        </div>
        <div class="rating">
            <h3 class="anime-info__title visually-hidden">Рейтинг</h3>
            <dl>
                <dt>Средний рейтинг:</dt>
                <dd>4.3</dd>
            </dl>
            <a class="rating__button" href="">Оставить отзыв</a>
        </div>
    </div>
    <p class="info__description"><?= Html::encode($post->desc) ?></p>
<!--    <video class="info__video" src=""></video>-->
</section>

<section class="comment">
    <h2 class="comment__title">Комментарии</h2>
    <div class="mb-3">
        <label for="comment" class="form-label">Введите свой комментарий:</label>
        <textarea class="form-control" id="comment" rows="3"></textarea>
    </div>
    <div class="comment__wrapper">

        <?php foreach ($post->comments as $comment): ?>
            <div class="comment__item">
                <div class="comment__info">
                    <img class="comment__author-image" src="" alt="Аватар автора">
                    <span class="comment__author-name"><?= Html::encode($comment->user->login) ?></span>
                    <span class="comment__date"><?= Html::encode($comment->created_at) ?></span>
                </div>
                <p class="comment__text"><?= Html::encode($comment->text) ?></p>
            </div>
        <?php endforeach; ?>

    </div>
</section>
