<?php

namespace app\controllers;

use app\models\LeftSide;
use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\data\Pagination;

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

        $brand = LeftSide::getLeft();

        return $this->render('main', [
            'products' => $products,
            'pagination' => $pagination,
            'brand' => $brand,
        ]);
    }

    public function actionType()
    {
        $products = Product::findType();
        $brand = LeftSide::getLeft();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die(); // TODO

        return $this->render('type', [
            'products' => $products,
            'brand' => $brand,
        ]);
    }

    public function actionTypeBrand()
    {
        $products = Product::findTypeBrand();
        $brand = LeftSide::getLeft();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die(); //  TODO

        return $this->render('type_brand', [
            'products' => $products,
            'brand' => $brand,
        ]);
    }

    public function actionBrand()
    {
        $products = Product::findBrand();
        $brand = LeftSide::getLeft();
//        echo "<pre>";
//        print_r($products);
//        echo "</pre>";
//        die(); //  TODO

        return $this->render('brand', [
            'products' => $products,
            'brand' => $brand,
        ]);
    }

    public function actionProduct()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $brand = LeftSide::getLeft();

        return $this->render('product', [
            'product' => $product,
            'brand' => $brand,
        ]);
    }

}
