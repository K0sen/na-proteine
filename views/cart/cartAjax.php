<?php

/* @var $products yii\web\View */

use yii\helpers\Html;

?>
<div id="product" class="row">
    <div id="cart">
        <?= Html::img('@web/img/cart.jpg', ['id' => 'cartImg']); ?>

        <?php
        if(isset($products)){
            $count = 1;
            foreach($products as $product) {

                if ( file_exists('img/products/' . $product['image']) && $product['image'] != "" ) {
                    echo Html::img('@web/img/products/' . $product['image'], ['class' => 'smallImg', 'id' => 'p'. $count]); ;
                } else {
                    echo Html::img('@web/img/products/default.png', ['class' => 'smallImg', 'id' => 'p'. $count]);
                }

                $count++;
            }
        } else {
            echo Html::img('@web/img/nothing.png', ['class' => 'smallImg', 'id' => 'nothing']);
        }
        ?>
    </div>
    <div id="cartContent">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
        <?php if(isset($products)) :
            foreach($products as $product) : ?>
                <div class="cartItem">
                    <span class="cartCount">x
                        <?php if($product['count'] >= 1) : ?>
                        <input class="item_count" type="number" min="1" max="<?= $product['count'] ?>" value="1" size="5">
                        <?php else : ?>
                        <input class="item_count" type="number" min="0" max="0" value="0" size="5">
                        <?php endif; ?>
                    </span>
                    <span class="cartImg">
                    <?php
                    if ( file_exists('img/products/' . $product['image']) && $product['image'] != "" ) {
                        echo Html::img('@web/img/products/' . $product['image']); ;
                    } else {
                        echo Html::img('@web/img/products/default.png');
                    }
                    ?>
                    </span>
                    <span class="cartName"><?= $product['name'] ?></span>
                    <span class="cartBrand"><?= $product['brand'] ?></span>
                    <span class="cartPrice"><?= $product['price'] ?></span>
                    <span class="cartDetail"><a href="
                                            <?= Yii::$app->urlManager->createUrl("product/{$product['id']}"); ?>
                                            ">Подробнее</a></span>
                    <span class="btn cartRemove">X</span>
                    <input class="hidden_id" type="hidden" value="<?= $product['id'] ?>">
                </div>
            <?php endforeach; ?>
        <button class="btn cartClean">Очистить Корзину</button>
        <button class="btn buy">Купить</button>
        <?php else  : ?>
            <span id="cartNoProducts">No products, please Lorem ipsum dolor sit.</span>
        <?php endif; ?>
    </div>

<!--    --><?//= $this->render('@app/views/cart/buy.php', ['products' => $products]) ?>
</div>

