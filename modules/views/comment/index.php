<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\models\CommentsControl */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'comment',
//           'user_id',
            [                                   //create search area for brand
                'attribute' => 'user_id',
                'value' => 'user.username'
            ],
            [
                'attribute' => 'created_at',
                'value' => 'created_at',
                'format' => ['DateTime', 'php:Y.m.d H:i:s']
            ],
            [
                'attribute' => 'updated_at',
                'value' => 'updated_at',
                'format' => ['DateTime', 'php:Y.m.d H:i:s']
            ],
            // 'product_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
