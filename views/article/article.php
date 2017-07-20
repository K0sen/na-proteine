<?php

/** @var $articles yii\web\View **/
use yii\helpers\Html;

$this->title = 'Articles';

foreach ($articles as $value) {
    echo Html::beginTag('div', ['class' => 'article']);
        echo Html::tag('div', $value['title'], ['class' => 'article__title']);
    if (file_exists('img/articles/'.$value['image']) && $value['image'] != "") {
        echo Html::img('@web/img/articles/'.$value['image'], ['alt' => 'article', 'class' => 'article__img']); ;
    } else {
        echo Html::img('@web/img/articles/default.jpg', ['alt' => 'article', 'class' => 'article__img']);
    }
        echo Html::tag('div', $value['description_short'], ['class' => 'article__description']);
        echo Html::a(' Read more', "article/{$value['id']}");
    echo Html::endTag('div');
    echo Html::tag('hr');
}

