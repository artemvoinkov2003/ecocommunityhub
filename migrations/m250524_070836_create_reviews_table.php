<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reviews}}`.
 */
class m250524_070836_create_reviews_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'article_id' => $this->integer(),
            'photo' => $this->string()->null(),
            'rating'=> $this->integer()->notNull()->defaultValue(5),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey('fk-reviews-article_id',
            '{{%reviews}}',
            'article_id',
            '{{%articles}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey('fk-reviews-user_id',
            '{{%reviews}}',
            'user_id',
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
        $this->dropForeignKey('fk-reviews-user_id', '{{%reviews}}');
        $this->dropForeignKey('fk-reviews-article_id', '{{%reviews}}');
        $this->dropTable('{{%reviews}}');
    }
}