<?php

/* @var $this yii\web\View */
/* @var $brand yii\web\View */

use yii\helpers\Html;

$this->title = 'Cart';
$script = <<< JS
    alert(1);
JS;
//echo $script;
//
//echo Yii::getAlias('@app/migrations');

echo Yii::$app->user->getId();

$auth = Yii::$app->authManager;
$adm = $auth->getRole('admin');
//$auth->assign($adm, 1);

echo "<pre>";
print_r(\app\models\User::findIdentity(1)->username);
//print_r(Yii::$app->authManager);
echo "-------------------------------<br>";
print_r(Yii::$app);
print_r(get_declared_classes());
echo "</pre>";

$ref = new ReflectionClass('yii\base\Application');
print $ref->getFileName() . ':' . $ref->getStartLine();

?>




