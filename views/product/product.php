<?php
/* @var $product yii\web\View */
/* @var $comments yii\web\View */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Comments */

use yii\helpers\Html;

$this->title = $product['name'];
$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['/brand']];
$this->params['breadcrumbs'][] = ['label' => $brand->brand, 'url' => ['brand/'.strtolower(str_replace(' ', '_', $brand->brand))]];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php if ($product) : ?>

    <div id="product-top">
        <div id="product-img">
            <?php
            if ( file_exists('img/products/' . $product['image']) && $product[
                'image'] != "" ) {
                echo Html::img('@web/img/products/' . $product['image']); ;
            } else {
                echo Html::img('@web/img/products/default.png');
            }
            ?>
        </div>
        <input id="p_id" type="hidden" value="<?=$product['id']?>">
        <?php if($product['count'] <= 0) : ?>
            <a href="<?= Yii::$app->urlManager->createUrl('/'); ?>" style="text-decoration: none; color: black;"><span class="btn">Out of sale. To main</span></a>
        <?php else : ?>
            <a href="<?= Yii::$app->urlManager->createUrl('/cart'); ?>" style="text-decoration: none; color: black;"><span class="btn toCart">Пройти на кассу</span></a>
            <span class="btn cartAdd">Добавить в корзину</span>
        <?php endif; ?>
    </div>
    <div id="product-info">
        <div id="switch">
            <div class="btn characteristic">Характеристика</div>
            <div class="btn replies">Отзывы</div>
        </div>

        <div id="text-characteristic"><?= $product['info'] ?></div>
        <div id="text-replies">
            <?php $this->registerJsFile("@web/js/comments.js", ['depends' => 'yii\web\YiiAsset'])?>
        </div>
    </div>

<?php else : ?>

    Not exist item with id "<?= $_GET['id']; ?>"

<?php endif; ?>
