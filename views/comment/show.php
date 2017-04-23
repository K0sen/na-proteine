<?php
/* @var $product yii\web\View */
/* @var $comments yii\web\View */
/* @var $product_id yii\web\View */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Comments */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

if($comments) {
    foreach ($comments as $value) {
        echo '<div class="comment">';
        echo Html::input('hidden', null, $value['id'], ['class' => 'comment_id']);
        echo 'Author: <b>' . \app\models\User::findIdentity($value['user_id'])->username . '</b>&nbsp&nbsp&nbsp';
        echo Html::tag('div', 'created at: ' . date("Y.m.d H:i:s", $value['created_at']), ['class' => 'created']);
        echo '<div class="commentText">' . $value['comment'] . '</div>';

        echo Html::beginTag('div', ['id' => 'input']);
        echo Html::textarea('inputText', $value['comment'], ['class' => 'form-control', 'rows' => 6]);
        echo Html::button('OK', ['class' => 'btn confirm_update', 'title' => 'update a comment']);
        echo Html::button('X', ['class' => 'btn btn-danger cancel_upd', 'title' => 'cancel an update']);
        echo Html::endTag('div');

        if(Yii::$app->user->can('updateOwnComment', ['post' => $value])){
            echo Html::button('Upd', ['class' => 'btn update_comment', 'title' => 'update a comment']);
        }
        if(Yii::$app->user->can('deleteComment')){
            echo Html::button('X', ['class' => 'btn btn-danger delete_comment', 'title' => 'delete a comment']);
        }
        if($value['updated_at'] > $value['created_at']) {
            echo Html::tag('span', 'updated at: ' . date("Y.m.d H:i:s", $value['updated_at']), ['class' => 'updated']);
        }
        echo '</div>';
    }
} else {
    echo 'No comments yet';
}

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