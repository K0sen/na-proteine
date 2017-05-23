<?php

/* @var $categories yii\web\View */

use yii\helpers\Html;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;

?>

<ul class="categories-list">
    <label for="categories-list">categories-list</label>
    <?php foreach ($categories as $key=>$value) :?>
        <li>
            <a href="<?php
            $name = strtolower(str_replace(' ', '_', $value->type));
            echo Yii::$app->urlManager->createUrl("categories/$name"); ?>">
                <?= $key+1 . '. ' . Yii::t('app', $name) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>