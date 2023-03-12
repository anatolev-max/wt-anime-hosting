<?php

namespace app\assets;

use yii\web\AssetBundle;

class ViewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/post.css',
    ];
    public $js = [
    ];
    public $depends = [
        'app\assets\LayoutAsset'
    ];
}