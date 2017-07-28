<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/bootstrap.css',
        'css/jquery-ui.css',
        'css/owl.carousel.css',
        'css/owl.theme.default.css'
    ];

    public $js = [
        'js/scripts.js',
        'js/bootstrap.min.js',
        'js/jquery.js',
        'js/jquery-ui.js',
        'js/cookie.js',
        'js/owl.carousel.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
