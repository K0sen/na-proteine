<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */
/* @var $role */
/* @var $roles  */

$this->title = 'User #'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php ob_start(); ?>
<div id="demo" class="collapse">
    <form method="post" action="<?= Yii::$app->urlManager->createUrl('/admin/user/role?id='.$_GET['id']) ?>">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->getRequest()->getCsrfToken() ?>">
        <label for="role">Role select:</label><br>
        <select name="role">
            <option disabled><?= $role ?></option>
            <?php foreach ($roles as $value) {
                if($value->name != $role && $model['id'] != 1) {
                    echo '<option name="'.$value->name.'">'.$value->name.'</option>';
                }
            }
            ?>
        </select><br>
        <input type="submit" value="Изменить">
    </form>
</div>
<?php $my_var = ob_get_clean();?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'username',
        'created_at:datetime',
        'updated_at:datetime',
        'email',
        'status',
        [
            'label' => 'Role',
            'format' => 'raw',
            'value' => $role . PHP_EOL . Html::button('Change', [
                    'class' => 'btn btn-danger',
                    'data-target' => '#demo',
                    'data-toggle' => "collapse"
                ]) . $my_var
        ]
    ],
]) ?>

