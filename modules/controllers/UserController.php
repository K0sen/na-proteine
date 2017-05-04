<?php

namespace app\modules\controllers;

use Yii;
use yii\web\Controller;
use app\modules\models\UserControl;
use yii\web\User;

class UserController extends Controller
{

    public function actionIndex()
    {
        $model = new UserControl();

        $users = $model->find()->all();

        return $this->render('index', ['users' => $users]);

    }

}