<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\models\ProductControl */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Product', ['create'], ['class' => 'btn btn-success']); ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'price',
            [                                   //create search area for type   (type_id)
                'attribute' => 'type_id',
                'value' => 'type.type'
            ],
            [                                   //create search area for brand
                'attribute' => 'brand_id',
                'value' => 'brand.brand'
            ],
            'count',
//            'popularity',
//            'info',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
