<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

echo "USING FOR TEST SCRIPTS".'<br>';

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

<canvas id="cnv"></canvas>
<script type="text/javascript" charset="utf-8">
    cnv = document.getElementById("cnv");
    cnv.width = 700;
    cnv.height = 500;
    ctx = cnv.getContext("2d");
    ctx.font = "bold 12px sans-serif";
    text = "abcdefghijklm";
    for (i = 0; i < text.length; i++) {
        ctx.fillText(text[i], 300, 100);
        ctx.rotate(0.05);
    }
</script>