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


echo "-------------------------------<br>";
if (\Yii::$app->user->can('updateOwnComment')) {
    echo '    can';
} else {
    echo '    no';
}
echo "<pre>";
print_r(Yii::$app->user->identity->findIdentity(2)->username);
//print_r(Yii::$app->authManager);
echo "-------------------------------<br>";
print_r(Yii::$app);
print_r(get_declared_classes());
echo "</pre>";

$ref = new ReflectionClass('yii\base\Application');
print $ref->getFileName() . ':' . $ref->getStartLine();

?>




