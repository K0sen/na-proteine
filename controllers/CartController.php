<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;

class CartController extends Controller
{

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

    public function acrionBuy()
    {
        return $this->renderAjax('buy');
    }

}