<?php

namespace app\modules\controllers;

use Yii;
use yii\web\Controller;
use app\modules\models\UserControl;

class UserController extends Controller
{

    public function actionIndex()
    {
        $model = new UserControl();
        $users = $model->find()->all();

        return $this->render('index', ['users' => $users]);

    }

    public function actionShow($id)
    {
        $model = new UserControl();

        $auth = Yii::$app->authManager;
        $role = key($auth->getRolesByUser($id));
        $roles = $auth->getRoles();

        return $this->render('show', [
            'model' => $model->findOne($id),
            'role' => $role,
            'roles' => $roles
        ]);
    }

    public function actionRole($id)
    {
        $auth = Yii::$app->authManager;
        $role = $auth->getRole(Yii::$app->request->post('role'));
        if($role) {
            $auth->revokeAll($id);
            $auth->assign($role, $id);
        }

        return $this->redirect('/admin/user/'.$id);
    }



}