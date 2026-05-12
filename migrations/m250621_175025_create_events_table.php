<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m250621_175025_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'start_date' => $this->dateTime()->notNull(),
            'end_date' => $this->dateTime()->notNull(),
            'location' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'category' => $this->string(100),
            'image' => $this->string(100),
            'color' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%events}}');
    }
}
