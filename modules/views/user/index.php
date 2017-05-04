<?php
/* @var $this yii\web\View */
/* @var $users  */
/* @var $dataProvider yii\data\ActiveDataProvider */

foreach ($users as $value) {
    echo $value['username'] . '<br>';
}