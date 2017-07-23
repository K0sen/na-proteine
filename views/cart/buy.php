<?php

/* @var $products yii\web\View */

?>

<div class="buy_shadow">
    <div class="buy__window">
        <div class="buy__title">Подтвердите покупку<span class="buy__close">X</span></div>
        <div class="buy__list">
            <?php foreach($products as $product) : ?>
            <div class="item">
                <div class="item__name"><?= $product['name'] ?></div>
                <div class="item__sum">
                    <span class="item__price"><?= $product['price'] ?></span>
                    <span>x</span>
                    <span class="item__count">5</span>
                    <span>=</span>
                    <span class="item__result">2150</span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
