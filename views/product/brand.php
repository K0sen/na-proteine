<?php

/* @var $this yii\web\View */
/* @var $products yii\web\View */
/* @var $brand yii\web\View */
use yii\helpers\Html;

$this->title = $products[0]['brand'];
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['/brand']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php if($products) : ?>

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
                <div class="icons">
                    <span class="basket" title="Добавить в корзину"></span>
                </div>
                <input type="hidden" size="3" value="<?= $product['id']?>" class="hidden_id">
            </div>
        </div>
        <?php endforeach; ?>

<?php else : ?>
    <?php $this->title = 'Error';
    ?>

    No products in this category :(
    <!--    TODO-->

<?php endif; ?>
