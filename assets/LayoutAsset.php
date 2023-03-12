<?php

namespace app\assets;

use yii\web\AssetBundle;

class LayoutAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/null.css',
//        'css/style.css',
        'css/header.css',
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\BootstrapAsset'
    ];
}