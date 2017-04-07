<?php

namespace app\controllers;

use app\models\Comments;
use app\models\LeftSide;
use Yii;
use yii\web\Controller;
use app\models\Product;
use yii\data\Pagination;
use yii\web\IdentityInterface;

class ProductController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                // 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

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
        if(!Yii::$app->user->isGuest) {
            $user_id = Yii::$app->user->identity->getId();
        }
        $comment_model = new Comments();
        $comments = $comment_model->find()
            ->asArray()
            ->where(['product_id' => $product_id])
            ->all();

        if ($comment_model->load(Yii::$app->request->post())) {

            if ($comment_model->addComment($user_id, $product_id)) {
                Yii::$app->getSession()->setFlash('success', 'Вы оставили свой отзыв');
                return $this->refresh();
            }

        }

        return $this->render('product', [
            'product' => $product,
            'model' => $comment_model,
            'comments' => $comments,
        ]);
    }

}
