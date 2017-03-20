<?php

namespace app\modules;

use Yii;
use yii\base\Module;


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
}
