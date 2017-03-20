<?php use yii\helpers\Html; ?>
<div id="product" class="row">
    <div id="cart">
        <?= Html::img('@web/img/cart.jpg', ['id' => 'cartImg']); ?>

        <?php
        if(isset($products)){
            $count = 1;
            foreach($products as $product) {

                if(file_exists('img/products/'.$product['id'].'.png')){
                    echo Html::img('@web/img/products/'.$product['id'].'.png', ['class' => 'smallImg', 'id' => 'p'. $count]);
                } else {
                    echo Html::img('@web/img/goldwhey.jpg', ['class' => 'smallImg', 'id' => 'p'. $count]);
                }
                $count++;
            }
        } else {
            echo Html::img('@web/img/nothing.png', ['class' => 'smallImg', 'id' => 'nothing']);
        }
        ?>
    </div>
    <div id="cartContent">
        <?php if(isset($products)) :

            foreach($products as $product) : ?>
                <div>
                    <span class="cartCount">x<input type="number" min="1" max="99" value="1" size="5"></span>
                    <span class="cartImg"><?php
                    if(file_exists('img/products/'.$product['id'].'.png')){
                    echo Html::img('@web/img/products/'.$product['id'].'.png');
                    } else {
                    echo Html::img('@web/img/goldwhey.jpg');
                    }?></span>
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
        <span class="btn cartClean">Очистить Корзину</span>
        <span class="btn buy">Купить</span>
        <?php else : ?>
            <span id="cartNoProducts">No products, please Lorem ipsum dolor sit.</span>
        <?php endif; ?>
    </div>
</div>

