<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%services}}`.
 */
class m240129_192255_create_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'image' => $this->string(),
            'price' => $this->decimal(10, 2)->notNull(),
            'category_id' => $this->integer()->notNull(),
            'car_types' => "ENUM('new', 'used', 'both') NOT NULL",
            'warranty' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk-services-category_id',
            'services',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%services}}');
    }
}
