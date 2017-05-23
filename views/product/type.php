<?php

/* @var $this yii\web\View */
/* @var $products yii\web\View */
/* @var $brand yii\web\View */


use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$this->title = strtoupper(Yii::$app->request->get('type'));
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['/']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php if ($products) : ?>

    <?php foreach ($products as $product) : ?>
        <div class="col-xs-6 col-md-6 col-lg-4">
            <div class="information">
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

