<?php

/* @var $this yii\web\View */
/* @var $brand yii\web\View */
/* @var $cart yii\web\View */

use yii\helpers\Html;

$this->title = 'Cart';

echo Html::img('@web/img/animatedEllipse.gif', ['id' => 'wait']);

$this->registerJsFile("@web/js/cart.js", ['depends' => 'yii\web\YiiAsset']);

?>


