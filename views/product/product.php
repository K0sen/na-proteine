<?php
/* @var $product yii\web\View */
/* @var $comments yii\web\View */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Comments */

use yii\helpers\html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

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
        <a href="<?= Yii::$app->urlManager->createUrl('/cart'); ?>" style="text-decoration: none; color: black;"><span class="btn toCart">Пройти на кассу</span></a>
        <span class="btn cartAdd">Добавить в корзину</span>
    </div>
    <div id="product-info">
        <div id="switch">
            <div class="btn characteristic">Характеристика</div>
            <div class="btn replies">Отзывы</div>
        </div>

        <div id="text-characteristic"><?= $product['info'] ?></div>
        <div id="text-replies">
            <?php
            if(Yii::$app->user->can('updateComment')){
                echo 'can update' . '<br>';
            }
            if($comments) {
                foreach ($comments as $value) {
                    echo '<div class="comment">';
                    echo 'Author: <b>' . \app\models\User::findIdentity($value['user_id'])->username . '</b>&nbsp&nbsp&nbsp';
                    echo '<i>created at: ' . date("Y.m.d H:i", $value['created_at']) . '</i><br>' . '<br>';
                    echo $value['comment'] . '<br>' . '<br>';
                    if($value['updated_at'] > $value['created_at']) {
                        echo '<i>last update: ' . date("Y.m.d H:i", $value['updated_at']) . '</i><br>';
                    }
                    if(Yii::$app->user->can('updateComment', ['post' => $value])){
                        echo Html::button('Update your comment', ['class' => 'btn', 'name' => 'send_comment']);
                    }
                    echo '</div>';
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
            } else if(Yii::$app->user->isGuest){
                echo Html::tag('span', 'Для добавления комментария необходима авторизация.', ['class' => 'alert-info alert']);
            } else {
                echo Html::tag('span', 'Чтобы оставить комментарий подтвердите свой е-мейл', ['class' => 'alert-info alert']);
            }
            ?>
        </div>
    </div>

<?php else: ?>

    Not exist item with id "<?= $_GET['id']; ?>"

<?php endif ?>
