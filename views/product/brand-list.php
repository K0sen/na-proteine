<?php

/* @var $brands yii\web\View */

use yii\helpers\Html;

$this->title = 'Brands';
$this->params['breadcrumbs'][] = $this->title;

?>

<ul class="brand-list">
    <label for="brand-list">Brand-list</label>
    <?php foreach ($brands as $key=>$value) :?>
        <li>
            <a href="<?php
            $name = strtolower(str_replace(' ', '_', $value->brand));
            echo Yii::$app->urlManager->createUrl("brand/$name"); ?>">
            <?= $key+1 . ". {$value->brand}" ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>