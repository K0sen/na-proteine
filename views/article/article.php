<?php

/** @var $articles yii\web\View **/
use yii\helpers\Html;

$this->title = 'Articles';

foreach ($articles as $value) {
    echo Html::beginTag('div', ['class' => 'article']);
    echo Html::tag('div', $value['title'], ['class' => 'article_title']);
    echo Html::tag('span', $value['description_short'], ['class' => 'article_content']);
    echo Html::a(' Read more', "article{$value['id']}");
    echo Html::endTag('div');
    echo Html::tag('hr');
}

