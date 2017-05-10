<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $users  */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'UserControl';
$this->params['breadcrumbs'][] = $this->title;

$auth = Yii::$app->authManager;
$auth->getRoles()
?>

<div id="user-table">

<?php foreach ($users as $value) : ?>
    <div class="user">
        <span class="username"><?= $value['username']; ?></span>
        <span class="user-email"><?= $value['email']; ?></span>
        <span class="user-create"><?= date('Y:m:d h:i:s', $value['created_at']); ?></span>
        <span class="user-role"><?= key($auth->getRolesByUser($value['id'])) ?></span>
        <a href="<?= Yii::$app->urlManager->createUrl("admin/user/{$value['id']}") ?>"><span class="glyphicon glyphicon-eye-open"></span></a>
    </div>
<?php endforeach; ?>
</div>

