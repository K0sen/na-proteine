<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'type_id', 'brand_id', 'count', 'info'], 'required'],
            [['price'], 'number'],
            [['type_id', 'brand_id', 'count', 'popularity'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['info'], 'string', 'max' => 500],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['image'],  'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'type_id' => 'Type',    //change label and error message
            'brand_id' => 'Brand',  //change label and error message
            'count' => 'Count',
            'popularity' => 'Popularity',
            'info' => 'Info',
            'image' => 'Image Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }


    public static function getProducts($pagination, $sort)
    {
        $orderBy = null;

        if($sort == 'price_up') {
            $orderBy = 'ORDER BY price ASC';
        } else if ($sort == 'price_down') {
            $orderBy = 'ORDER BY price DESC';
        }

        $products = Yii::$app->db->createCommand("SELECT p.id ,p.name, p.price, b.brand AS brand, t.type, p.image
                                                 FROM product p
                                                 LEFT JOIN brand b ON b.id = p.brand_id
                                                 LEFT JOIN type t ON t.id = p.type_id
                                                 $orderBy
                                                 LIMIT $pagination->limit OFFSET $pagination->offset
                                                 ")
                                    ->queryAll(); // TODO request by AR

        return $products;
    }

    public static function getMainPage()
    {
        $types = Type::find()->asArray()->all();
        $products = [];

        foreach($types as $type) {

            $products[$type['type']] = Yii::$app->db->createCommand("SELECT p.id, p.price, p.name, p.count, p.popularity, b.brand, t.type, p.image
                                                                    FROM `product` p
                                                                    LEFT JOIN type t ON t.id = p.type_id
                                                                    LEFT JOIN brand b ON b.id = p.brand_id
                                                                    WHERE t.type = :type
                                                                    ORDER BY p.popularity DESC
                                                                    LIMIT 10
                                                                    ")
                                                    ->bindValue(':type', $type['type'])
                                                    ->queryAll(); // TODO request by AR

        }

        return $products;
    }

    public static function findTypeBrand()
    {
        $brand = Yii::$app->request->get('brand');
        $type = Yii::$app->request->get('type');
        $brand = str_replace('_', ' ', $brand);
        $type = str_replace('_', ' ', $type);
        $products = Yii::$app->db->createCommand("SELECT p.id, p.price, p.name, b.brand AS brand, t.type, p.image
                                                FROM `product` p
                                                LEFT JOIN brand b ON b.id = p.brand_id
                                                LEFT JOIN type t ON t.id = p.type_id
                                                WHERE b.brand = :brand
                                                AND t.type = :type
                                                 ")
                                    ->bindValue(':brand', $brand)
                                    ->bindValue(':type', $type)
                                    ->queryAll();
        return $products;
    }

    public static function findType()
    {
        $type = Yii::$app->request->get('type');
        $type = str_replace('_', ' ', $type);
        $products = Yii::$app->db->createCommand("SELECT p.id, p.price, p.name, b.brand AS brand, t.type, p.image
                                                FROM `product` p
                                                LEFT JOIN brand b ON b.id = p.brand_id
                                                LEFT JOIN type t ON t.id = p.type_id
                                                WHERE  t.type = :type
                                                 ")
                                    ->bindValue(':type', $type)
                                    ->queryAll();
        return $products;
    }

    public static function findBrand()
    {
        $brand = Yii::$app->request->get('brand');
        $brand = str_replace('_', ' ', $brand);
        $products = Yii::$app->db->createCommand("SELECT p.id, p.price, p.name, b.brand AS brand, t.type, p.image
                                                FROM `product` p
                                                LEFT JOIN brand b ON b.id = p.brand_id
                                                LEFT JOIN type t ON t.id = p.type_id
                                                WHERE b.brand = :brand
                                                 ")
                                    ->bindValue(':brand', $brand)
                                    ->queryAll();
        return $products;
    }

    public static function findByCookie(){
        if (isset($_COOKIE['product_id']) && $_COOKIE['product_id'] != '') {
            $ids = explode(", ", $_COOKIE['product_id']);
            return $ids;
        } else {
            return null;
        }
    }

    public static function findByID(array $ids = null)
    {
        if ($ids){
            $products = [];
            foreach ($ids as $id) {
                $product = Yii::$app->db->createCommand("SELECT p.id, p.price, p.name, p.count, p.image, b.brand AS brand, t.type
                                                        FROM `product` p
                                                        LEFT JOIN brand b ON b.id = p.brand_id
                                                        LEFT JOIN type t ON t.id = p.type_id
                                                        WHERE p.id = :id
                                                        ")
                                        ->bindValue(':id', $id)
                                        ->queryOne();
                $products[] = $product;
            }
            return $products;
        } else {
            return null;
        }
    }

    public function buy(array $products)
    {
        foreach ($products as $id => $count) {
            $product = Product::findOne($id);
            $product->count -= $count;
            $product->popularity++;
            if(!$product->update()) return null;
        }
        return $products;
    }

    public function buyCountCheck(array $products)
    {
        foreach ($products as $id => $count) {
            $product = Product::findOne($id);
            if($product->count < $count) {
                return false;
            }
        }
        return true;
    }
}

