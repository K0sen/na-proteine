<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user_table`.
 */
class m170113_145207_fill_database extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $inner = file_get_contents(Yii::getAlias('@app').'/na_proteine.sql');
        Yii::$app->db->createCommand($inner)->execute();

    }

    public function safeDown()
    {
//        $command = 'DROP DATABASE `na_proteine`';
//        $this->execute($command);
    }
}
