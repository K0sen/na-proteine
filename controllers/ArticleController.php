<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\web\Controller;

class ArticleController extends Controller
{

    public function actionIndex()
    {
        $model = new Article();
        $articles = $model->find()->all();

        return $this->render('article', ['articles' => $articles]);

    }

    public function actionShow($id)
    {
        $model = new Article();
        $article = $model->findOne($id);

        return $this->render('show', ['article' => $article]);
    }


}