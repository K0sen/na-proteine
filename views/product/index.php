<?php

/* @var $this yii\web\View */
/* @var $pagination yii\web\View */
/* @var $product_type yii\web\View */
/* @var $brand yii\web\View */

$this->title = 'Na-proteine';
use yii\helpers\Html;
use yii\widgets\LinkPager;

//debug( $products );

?>
<?php foreach ($product_type as $key => $products) : ?>
    <div class="information-title"><span><?= Yii::t('app', "{$key}") . ' - Popular' ?></span></div>
    <div class="owl-carousel owl-theme">
    <?php foreach ($products as $product) : ?>
        <div class="information item">
            <div class="img">
                <a href="<?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>" >
                    <?php
                    $check = file_exists('img/products/'.$product['id'].'.png');
                    if ($check) {
                        echo Html::img('@web/img/products/'.$product['id'].'.png'); ;
                    } else {
                        echo Html::img('@web/img/goldwhey.jpg');
                    }
                    ?>
                </a>
            </div>
            <p class="name"><a href="<?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>"><?= $product['name']?> 2700g</a></p>
            <p class="brand"><a href="<?php
                $name = strtolower(str_replace(' ', '_', $product['brand']));
                echo Yii::$app->urlManager->createUrl("brand/$name"); ?>
                                 "><?= $product['brand']?></a></p>
            <p class="price"><?= $product['price']?> ₴</p>
            <div class="icons">
                <span class="basket" title="Добавить в корзину"></span>
            </div>
            <input type="hidden" size="3" value="<?= $product['id']?>" class="hidden_id">
        </div>
    <?php endforeach; ?>
    </div>
<?php endforeach; ?>