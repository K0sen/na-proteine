<?php

/* @var $brand  */
/* @var $article  */

use yii\helpers\Html;

?>

<div id="left_column">
    <div class="menu">
        <div id="partner">
            <div id="partner_title">
                <a href="#">Наши спонсоры</a>
            </div>
            <div id="picture">
                <?= Html::img('@web/img/Mr_Olympia.jpg'); ?>
            </div>
        </div>
        <ul>
            <?php foreach ($brand as $key => $brand_name) : ?>
            <li>
                <a href="<?php
                            $name = strtolower($key);
                            echo Yii::$app->urlManager->createUrl("categories/$name");?>"><?= Yii::t('app', "$name") ?></a>
                <span class="arrow"></span>
                <div class="brandname">
                    <ul>
                        <?php foreach($brand_name as $value) :?>
                            <li><a href="<?php
                                $name = strToLower(str_replace(' ', '_', $value['brand']));
                                $type = strToLower(str_replace(' ', '_', $value['type']));
                                echo Yii::$app->urlManager->createUrl("categories/$type/$name"); ?>
                                        "><?= $value['brand'] ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php foreach($article as $value) : ?>
    <div class="article_left">
        <div class="article_left_title">
            <a href="<?= Yii::$app->urlManager->createUrl("article/{$value['id']}") ?>"><?= $value['title'] ?></a>
        </div>
        <div class="article_left_desc">
            <?= $value['description_short'] ?>
            <a href="<?= Yii::$app->urlManager->createUrl("article/{$value['id']}") ?>">Read more</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
