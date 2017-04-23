<?php

namespace app\controllers;

use app\models\Comments;
use app\models\LeftSide;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Product;
use yii\data\Pagination;
use yii\web\IdentityInterface;

class ProductController extends Controller
{

    public function actionIndex()
    {
        $product = new Product();

        $var = $product::find()
                            ->with('brand')
                            ->all();

        return $this->render('index', ['var' => $var]);
    }

    public function actionMain()
    {
        $query = Product::find();

        $pagination = new Pagination([
            'defaultPageSize' => 12,
            'totalCount' => $query->count(),
        ]);

        $products = Product::getProducts($pagination);

        return $this->render('main', [
            'products' => $products,
            'pagination' => $pagination,
        ]);
    }

    public function actionType()
    {
        $products = Product::findType();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die(); // TODO

        return $this->render('type', [
            'products' => $products,
        ]);
    }

    public function actionTypeBrand()
    {
        $products = Product::findTypeBrand();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die(); //  TODO

        return $this->render('type_brand', [
            'products' => $products,
        ]);
    }

    public function actionBrand()
    {
        $products = Product::findBrand();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die(); //  TODO

        return $this->render('brand', [
            'products' => $products,
        ]);
    }

    public function actionProduct()
    {
        $product_id = Yii::$app->request->get('id');
        $product = Product::findOne($product_id);

        return $this->render('product', [
            'product' => $product,
        ]);
    }

}
