<?php

namespace app\controllers;

use app\models\Brand;
use app\models\Type;
use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\data\Pagination;

class ProductController extends Controller
{

    public function actionIndex()
    {
        $product_type = Product::getMainPage();

        return $this->render('index', [
            'product_type' => $product_type,
        ]);
    }

    public function actionType()
    {
        $products = Product::findType();

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

    public function actionBrandList()
    {
        $model = new Brand();
        $brands = $model->find()->all();

        return $this->render('brand-list', [
            'brands' => $brands,
        ]);
    }

    public function actionCategoriesList()
    {
        $model = new Type();
        $categories = $model->find()->all();

        return $this->render('categories-list', [
            'categories' => $categories,
        ]);
    }

    public function actionProduct($id)
    {
        $product = Product::findOne($id);
        $brand = Brand::findOne($product->brand_id); // TODO ??

        return $this->render('product', [
            'product' => $product,
            'brand' => $brand
        ]);
    }

}
