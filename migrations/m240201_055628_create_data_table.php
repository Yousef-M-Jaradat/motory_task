<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m240201_055628_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Insert dummy data for the 'categories' table
        $this->batchInsert('{{%categories}}', ['name', 'description'], [
            ['Category 1', 'Description for Category 1'],
            ['Category 2', 'Description for Category 2'],
        ]);

        // Insert dummy data for the 'services' table
        $this->batchInsert('{{%services}}', [
            'name', 'description', 'image', 'price', 'category_id', 'car_types', 'warranty'
        ], [
            ['Service 1', 'Description for Service 1', 'image1.jpg', 49.99, 1, 'new', 12],
            ['Service 2', 'Description for Service 2', 'image2.jpg', 29.99, 2, 'used', 6],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // You can add specific delete statements if needed
        $this->delete('{{%categories}}');
        $this->delete('{{%services}}');
    }
}
