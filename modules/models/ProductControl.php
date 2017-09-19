<?php

namespace app\modules\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\Product`.
 */
class ProductControl extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count', 'popularity'], 'integer'],
            [['name', 'type_id', 'brand_id', 'info'], 'safe'],    //change type/brand_id from integer to sage rule
            [['price'], 'number', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('type')->joinWith('brand');    //join tables

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
//            'type_id' => $this->type_id,
//            'brand_id' => $this->brand_id,
            'count' => $this->count,
            'popularity' => $this->popularity,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'type.type', $this->type_id])         //relationships between product.type_id and type.type
            ->andFilterWhere(['like', 'brand.brand', $this->brand_id]);     //relationships between product.brand_id and brand.brand

        return $dataProvider;
    }
}
