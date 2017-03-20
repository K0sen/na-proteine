<?php

namespace app\modules\controllers;

use Yii;
use yii\web\Controller;


/**
 * Default controller for the `Admin` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $abc  = Yii::$app->layout;

        $t = new \app\assets\AppAsset();

        return $this->render('main', [
            'layout' => $abc
        ]);
    }
}
