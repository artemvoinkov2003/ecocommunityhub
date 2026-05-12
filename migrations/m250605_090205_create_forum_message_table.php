<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%forum_message}}`.
 */
class m250605_090205_create_forum_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%forum_message}}', [
            'id' => $this->primaryKey(),
            'topic_id' => $this->integer()->notNull(),
            'content' => $this->text()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-forum_message-topic_id',
            '{{%forum_message}}',
            'topic_id',
            '{{%forum_topic}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-forum_message-author_id',
            '{{%forum_message}}',
            'author_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%forum_message}}');
        $this->dropForeignKey('fk-forum_message-topic_id', '{{%forum_message}}');
        $this->dropForeignKey('fk-forum_message-author_id', '{{%forum_message}}');
    }
}
