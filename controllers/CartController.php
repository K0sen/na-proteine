<?php

namespace app\controllers;

use app\models\LeftSide;
use Yii;
use yii\web\Controller;
use app\models\Product;

class CartController extends Controller
{

    public function actionShow()
    {
        $brand = LeftSide::getLeft();

        return $this->render('cart', [
            'brand' => $brand,
        ]);
    }

    public function actionCartAjax()
    {
        $ids = Product::findByCookie();
        $products = Product::findByID($ids);

        return $this->renderAjax('cartAjax', [
            'products' => $products
        ]);
    }

}