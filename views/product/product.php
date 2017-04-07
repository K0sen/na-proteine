<?php
/* @var $product yii\web\View */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Comments */

use yii\helpers\html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\widgets\Alert;

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
            <div class="btn characteristic">Характеристика</div>
            <div class="btn replies">Отзывы</div>
        </div>

        <div id="text-replies"><?= $product['info'] ?></div>
        <div id="text-characteristic">
            <?php

            if($comments) {
                foreach ($comments as $value) {
                    echo 'Author: ' . \app\models\User::findIdentity($value['user_id'])->username;
                    echo ' created at: ' . date("Y.m.d H:i", $value['created_at']) . '<br>' . '<br>';
                    echo $value['comment'] . '<br>';
                    if($value['updated_at'] > $value['created_at']) {
                        echo '<br>' . 'last update: ' . date("Y.m.d H:i", $value['updated_at']) . '<br>';
                    }
                    echo '<hr>';
                }
            } else {
                echo 'No comments yet';
            }

            echo '<br>' . '<br>';

            if (Yii::$app->user->can('addComment')) {

                $form = ActiveForm::begin(['id' => 'text-comment']);
                echo $form->field($model, 'comment')->textArea(['rows' => 6]);
                echo $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'captchaAction' => 'site/captcha',
                    'template' => '<div><div>{image}</div><div>{input}</div></div>',
                ]);
                echo Html::submitButton('Comment', ['class' => 'btn btn-primary', 'name' => 'send_comment']);
                ActiveForm::end();
            } else {
                echo Html::tag('span', 'Для добавления комментария необходима авторизация.');
            }
            ?>
        </div>
    </div>

<?php else: ?>

    Not exist item with id "<?= $_GET['id']; ?>"

<?php endif ?>
