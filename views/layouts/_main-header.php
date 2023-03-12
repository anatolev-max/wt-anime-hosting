<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$user = $this->context->user;

?>
<header class="page-header">
    <div class="container">
        <div class="page-header__search">
            <div class="page-header__search-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="485.213px" height="485.213px" viewBox="0 0 485.213 485.213" style="enable-background:new 0 0 485.213 485.213;"xml:space="preserve">
                    <g>
                        <path d="M471.882,407.567L360.567,296.243c-16.586,25.795-38.536,47.734-64.331,64.321l111.324,111.324    c17.772,17.768,46.587,17.768,64.321,0C489.654,454.149,489.654,425.334,471.882,407.567z"/>
                        <path d="M363.909,181.955C363.909,81.473,282.44,0,181.956,0C81.474,0,0.001,81.473,0.001,181.955s81.473,181.951,181.955,181.951    C282.44,363.906,363.909,282.437,363.909,181.955z M181.956,318.416c-75.252,0-136.465-61.208-136.465-136.46    c0-75.252,61.213-136.465,136.465-136.465c75.25,0,136.468,61.213,136.468,136.465    C318.424,257.208,257.206,318.416,181.956,318.416z"/>
                        <path d="M75.817,181.955h30.322c0-41.803,34.014-75.814,75.816-75.814V75.816C123.438,75.816,75.817,123.437,75.817,181.955z"/>
                    </g>
                </svg>
            </div>
            <input type="text" name="search" id="" class="page-header__search-input form-control" placeholder="Введите название видео">
        </div>

        <div class="page-header__logo-wrapper">
            <a class="page-header__logo" href="<?= Url::to(['site/index']) ?>">
                <h1>AnimeHub</h1>
            </a>
        </div>

        <div class="page-header__left-side">

            <?php if (Yii::$app->user->isGuest): ?>
                <a href="<?= Url::to(['user/login']) ?>" class="login">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;}</style></defs><title/><g data-name="Layer 2" id="Layer_2"><path d="M16,29A13,13,0,1,1,29,16,13,13,0,0,1,16,29ZM16,5A11,11,0,1,0,27,16,11,11,0,0,0,16,5Z"/><path d="M16,17a5,5,0,1,1,5-5A5,5,0,0,1,16,17Zm0-8a3,3,0,1,0,3,3A3,3,0,0,0,16,9Z"/><path d="M25.55,24a1,1,0,0,1-.74-.32A11.35,11.35,0,0,0,16.46,20h-.92a11.27,11.27,0,0,0-7.85,3.16,1,1,0,0,1-1.38-1.44A13.24,13.24,0,0,1,15.54,18h.92a13.39,13.39,0,0,1,9.82,4.32A1,1,0,0,1,25.55,24Z"/></g></svg>
                </a>
                <a href="<?= Url::to(['user/signup']) ?>" style="color: #fff;">Регистрация</a>
            <?php else: ?>
                <a href="<?= Url::to(['user/profile', 'userId' => $user->id ?? 1]) ?>">
                    <img
                            src="/uploads/avatars/<?= $user->avatar_path ?>"
                            alt=""
                            style="width: 40px; height: 40px; object-fit: cover; object-position: center; border-radius: 100%;"
                    >
                </a>
                <a href="<?= Url::to(['user/logout']) ?>" class="profile">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><title/><g id="logout"><line class="cls-1" x1="15.92" x2="28.92" y1="16" y2="16"/><path d="M23.93,25v3h-16V4h16V7h2V3a1,1,0,0,0-1-1h-18a1,1,0,0,0-1,1V29a1,1,0,0,0,1,1h18a1,1,0,0,0,1-1V25Z"/><line class="cls-1" x1="28.92" x2="24.92" y1="16" y2="20"/><line class="cls-1" x1="28.92" x2="24.92" y1="16" y2="12"/><line class="cls-1" x1="24.92" x2="24.92" y1="8.09" y2="6.09"/><line class="cls-1" x1="24.92" x2="24.92" y1="26" y2="24"/></g></svg>
                </a>
            <?php endif; ?>

        </div>
    </div>
</header>
