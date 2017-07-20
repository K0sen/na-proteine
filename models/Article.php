<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "article".
 *
 * @property string $id
 * @property string $title
 * @property string $description_short
 * @property string $description
 */
class Article extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description_short', 'description', 'image'], 'required'],
            [['title'], 'string', 'max' => 20],
            [['description_short'], 'string', 'max' => 500],
            [['description'], 'string', 'max' => 5000],
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
            'title' => 'Title',
            'description_short' => 'Description Short',
            'description' => 'Description',
            'image' => 'Image Name',
        ];
    }

    public static function getTwo()
    {
        $articles = self::find()->all();

        $middle = floor(count($articles)/2);
        $first = rand(1, $middle);
        $second = rand($middle+1, count($articles));

        $article = [self::findOne($first), self::findOne($second)];

        return $article;
    }
}
