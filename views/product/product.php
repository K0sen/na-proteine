<?php
/* @var $product yii\web\View */


use yii\helpers\html;


$this->title = $product['name'];
?>

<?php if ($product) : ?>

    <div id="product-top">
        <div id="product-img">
        <?php
        if(file_exists('img/products/'.$product['id'].'.png')){
            echo Html::img('@web/img/products/'.$product['id'].'.png');
        } else {
            echo Html::img('@web/img/goldwhey.jpg');
        }
        ?>
        </div>
        <a href="/cart" style="text-decoration: none; color: black;"><span class="btn toCart">Пройти на кассу</span></a>
        <span class="btn cartAdd">Добавить в корзину</span>
    </div>
    <div id="product-info">
        <div id="switch">
            <span class="btn characteristic">Характеристика</span>
            <span class="btn replies">Отзывы</span>
        </div>

        <div id="text-characteristic"><?= $product['info'] ?></div>
        <div id="text-replies">adsfaads asdf asdfasf asdfasdfasdf adsf adsf adf 1 514123 234</div>
    </div>

<?php else: ?>

    Not exist item with id "<?= $_GET['id']; ?>"

<?php endif ?>
