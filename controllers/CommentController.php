<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comments;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class CommentController extends Controller
{
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['update', 'delete'],
//                'rules' => [
//                    [
//                        'actions' => ['update'],
//                        'allow' => true,
//                        'matchCallback' => function ($rule, $action) {
//                            $model = $this->findModel(Yii::$app->request->post('comment_id'));
//                            return Yii::$app->getUser()->can('updateComment', ['post' => $model]);
//                        }
//                    ],
//                ],
//            ],
//        ];
//    }

    public function actionShow($product_id)
    {
        $comment_model = new Comments();
        $comments = $comment_model->find()
            ->where(['product_id' => $product_id])
            ->all();
        if(!Yii::$app->user->isGuest) {
            $user_id = Yii::$app->user->identity->getId();
            if ($comment_model->load(Yii::$app->request->post())) {
                if ($comment_model->addComment($user_id, $product_id)) {
                    Yii::$app->getSession()->setFlash('success', 'Ваш комментарий добавлен');
                    return $this->redirect("/product/$product_id?show=comments");
                }
            }
        }

        return $this->renderAjax('show', [
            'model' => $comment_model,
            'comments' => $comments,
        ]);

    }

    public function actionUpdate($comment_id)
    {
        if(Yii::$app->user->can('updateComment')) {
            $model = new Comments();
            $new_text = Yii::$app->request->post('new_text');
            $model->updateComment($comment_id, $new_text);
        }
    }

    public function actionDelete($comment_id)
    {
        if (Yii::$app->user->can('deleteComment')) {
            $a = new Comments;
            $a->deleteComment($comment_id);
        }
    }


}