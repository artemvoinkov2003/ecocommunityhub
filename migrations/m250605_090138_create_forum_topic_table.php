<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%forum_topic}}`.
 */
class m250605_090138_create_forum_topic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%forum_topic}}', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fk-forum_topic-section_id',
            '{{%forum_topic}}',
            'section_id',
            '{{%forum_section}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-forum_topic-author_id',
            '{{%forum_topic}}',
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
        $this->dropForeignKey('fk-forum_topic-section_id', '{{%forum_topic}}');
        $this->dropForeignKey('fk-forum_topic-author_id', '{{%forum_topic}}');
        $this->dropTable('{{%forum_topic}}');
    }
}
