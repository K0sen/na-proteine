<?php

use yii\helpers\Html;
/* @var $products yii\web\View */

if($products) {
    echo 'Bought: ' . '<br>';
    foreach($products as $id => $count) {
        echo \app\models\Product::findOne(1)->name . ' x' . $count . '<br>';
    }
    echo Html::a('To main page', '/');
} else {
    echo 'Something went wrong, contact administrator';
}

?>
