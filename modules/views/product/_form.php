<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Type;
use app\models\Brand;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

<!--    <?//= $form->field($model, 'type_id')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'type_id')->dropDownList(                  //create drop down list with all types (relationships product.type_id & type.type
        ArrayHelper::map(Type::find()->all(), 'id', 'type'),
        ['prompt' => 'Select type']
    ) ?>

<!--    <?//= $form->field($model, 'brand_id')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'brand_id')->dropDownList(                 //create drop down list with all brands (relationships product.brand_id & brand.brand
        ArrayHelper::map(Brand::find()->all(), 'id', 'brand'),
        ['prompt' => 'Select brand']
    ) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'popularity')->textInput() ?>

    <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
