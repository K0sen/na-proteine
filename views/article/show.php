<?php

/* @var $article yii\web\View */
use yii\helpers\Html;

$this->title = $article['title'];

?>

<div class="article">
    <div class="article__title"><?= $article['title'] ?></div>
    <?php
    if (file_exists('img/articles/'.$article['image']) && $article['image'] != "") {
    echo Html::img('@web/img/articles/'.$article['image'], ['alt' => 'article', 'class' => 'article__img']); ;
    } else {
    echo Html::img('@web/img/articles/default.jpg', ['alt' => 'article', 'class' => 'article__img']);
    }
    ?>
    <div class="article__description"><?= $article['description'] ?></div>
</div>

