<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 */
class m240131_093736_create_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->notNull(),
            'action' => $this->string()->notNull(),
            'details' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex(
            'idx-history-service_id',
            '{{%history}}',
            'service_id'
        );

        $this->addForeignKey(
            'fk-history-service_id',
            'history',
            'service_id',
            'services',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-history-service_id', '{{%history}}');
        $this->dropIndex('idx-history-service_id', '{{%history}}');
        $this->dropTable('{{%history}}');
    }
}
