<?php

/* @var $article yii\web\View */
use yii\helpers\Html;

$this->title = $article['title'];

?>

<div class="article">
    <div class="article_title"><?= $article['title'] ?></div>
    <span class="article_content"><?= $article['description'] ?></span>
</div>
