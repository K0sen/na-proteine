<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_table`.
 */
class m160705_103111_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => 'pk',
            'name' => 'string',
            'brandname' => 'string',
            'price' => 'money' 
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product');
    }
}
