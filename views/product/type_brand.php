<?php

/* @var $this yii\web\View */
/* @var $products yii\web\View */
/* @var $brand yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;

$brand = $products[0]['brand'];
$type = $products[0]['type'];

$this->title = "{$brand} - {$type}";
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['/categories']];
$this->params['breadcrumbs'][] = ['label' => $type, 'url' => ["categories/".Yii::$app->request->get('type')]];
$this->params['breadcrumbs'][] = $brand;

?>

<?php if ($products) : ?>

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

<?php else : ?>
<?php $this->title = 'Error';
?>

    No products in this category :(
    <!--    TODO-->

<?php endif; ?>

