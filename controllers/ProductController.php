<?php

namespace app\controllers;

use app\models\Brand;
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

    public function actionBrandList()
    {
        $brands = new Brand();
        $brands = $brands->find()->all();

        return $this->render('brand-list', [
            'brands' => $brands,
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
