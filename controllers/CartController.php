<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use app\models\Product;
use app\models\Log;
use yii\web\Cookie;

class CartController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'buy' => ['post'],
                ],
            ],
        ];
    }

    public function actionShow()
    {
        return $this->render('cart');
    }

    public function actionCartAjax()
    {
        $ids = Product::findByCookie();
        $products = Product::findByID($ids);

        return $this->renderAjax('cartAjax', [
            'products' => $products
        ]);
    }

    public function actionBuy()
    {
        $post = Yii::$app->request->post();
        unset($post['_csrf']);

        $productM = new Product();
        $logM = new Log();
        if(!empty($post)) {
            if($productM->buyCountCheck($post) && isset($_COOKIE['product_id'])) {
                $products = $productM->buy($post);
                if (isset($_COOKIE['product_id'])) {
                    unset($_COOKIE['product_id']);
                    setcookie('product_id', '', time() - 3600, '/');
                }
            } else {
                $products = null;
                $logM->status = 'Error' . PHP_EOL;
            }
            $logM->addOrder($post);

            return $this->render('buy', ['products' => $products]);
        }

        return $this->redirect('/');
    }

}