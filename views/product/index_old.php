<?php

/* @var $this yii\web\View */
/* @var $pagination yii\web\View */
/* @var $products yii\web\View */
/* @var $brand yii\web\View */

$this->title = 'Na-proteine';
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<div class="navigation">
    <div class="sorting">Сортировка по цене <a href="/?sort=price_up" id="price-up" class="sort_up" title="От дешевых к дорогим"></a>
                                            <a href="/?sort=price_down" id="price-down" class="sort_down" title="От дорогих к дешевым"></a>
    </div>
    <?= LinkPager::widget(['pagination' => $pagination,
        'lastPageLabel'=>'»',
        'firstPageLabel'=>'«',
        'prevPageLabel' => '<',
        'nextPageLabel' => '>',
        'maxButtonCount' => 5
            ]) ?>
</div>
<?php foreach ($products as $product) : ?>
<div class="col-xs-6 col-md-6 col-lg-4">
    <div class="information">
        <div class="img">
        <a href="<?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>" >
            <?php
            if ( file_exists('img/products/' . $product['image']) && $product['image'] != "" ) {
                echo Html::img('@web/img/products/' . $product['image']); ;
            } else {
                echo Html::img('@web/img/products/default.png');
            }
            ?>
        </a>
        </div>
        <span><?= $product['type'] ?></span>
        <p class="name"><a href="<?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>"><?= $product['name']?> 2700g</a></p>
        <p class="brand"><a href="<?php
                                    $name = strtolower(str_replace(' ', '_', $product['brand']));
                                    echo Yii::$app->urlManager->createUrl("brand/$name"); ?>
                                 "><?= $product['brand']?></a></p>
        <p class="price"><?= $product['price']?> ₴</p>
        <div class="basket">
            <span class="basket__add" title="Добавить в корзину"></span>
            <?php if($product['count'] <= 0) : ?>
            <span class="basket__inactive" title="Out of sale">
            <?php endif; ?>
        </div>
        <input type="hidden" size="3" value="<?= $product['id']?>" class="hidden_id">
    </div>
</div>
<?php endforeach; ?>
<div class="navigation">
    <div class="sorting">Сортировка по:    цене <span id="price-up" class="sort_up" title="От дешевых к дорогим"></span>
                                                <span id="price-down" class="sort_down" title="От дорогих к дешевым"></span>
                                   популярности <span id="popularity-up" class="sort_up" title="От отстоя к популярным"></span>
                                                <span id="popularity-down" class="sort_down" title="От популярных к отстойным"></span></div>
    <?= LinkPager::widget(['pagination' => $pagination,
    'lastPageLabel'=>'»',
    'firstPageLabel'=>'«',
    'prevPageLabel' => '<',
    'nextPageLabel' => '>',]) ?>
</div>