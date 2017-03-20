<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LeftSide extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public static function getLeft()
    {
        $brand = [];
        $result = [];
        for($i=1; $i<=6; $i++) {
            $command = Yii::$app->db->createCommand("SELECT p.id, p.name, GROUP_CONCAT(DISTINCT b.brand) as brand, t.type AS type, b.id AS brand_id
                                                    FROM product p
                                                    LEFT JOIN brand b ON b.id = p.brand_id
                                                    LEFT JOIN type t ON t.id = p.type_id
                                                    WHERE t.id = $i
                                                    GROUP BY b.id
                                                   ");
            $brand[] = $command->queryAll();
        }

        foreach ($brand as $key => $value) {
            $result += [$value[0]['type'] => $value];

        }

        return $result;
    }
}