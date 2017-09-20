<?php

use yii\helpers\Html;
/* @var $products yii\web\View */

if($products) {
    echo 'Bought: ' . '<br>' . '<br>';
    foreach($products as $id => $count) {
        echo \app\models\Product::findOne($id)->name . ' x' . $count . '<br>';
    }
    echo "<hr>";
    echo Html::a('To the main page', '/');
} else {
    echo 'Something went wrong, <a href="mailto:admin@na-proteine.net">contact administrator</a>';
}

?>
