<?php

namespace app\modules\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin-style.css',
//        'css/bootstrap.css'
    ];

    public $js = [
        'js/admin-scripts.js',
//        'js/bootstrap.min.js',
//        'js/jquery.sticky.js',
        'js/cookie.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
