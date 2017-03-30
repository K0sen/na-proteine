<?php

namespace app\modules;

use Yii;
use yii\base\Module;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * admin module definition class
 */
class Admin extends Module
{

//    public $layout = '@app/views/layouts/admin.php';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\controllers';

    /**
     * @inheritdoc
     */

    public function init()
    {
        parent::init();

    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
}
