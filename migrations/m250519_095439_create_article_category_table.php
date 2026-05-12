<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_category}}`.
 */
class m250519_095439_create_article_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
   public function safeUp()
{
    $this->createTable('article_category', [
        'id' => $this->primaryKey(),
        'name' => $this->string()->notNull(),
        'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
    ]);
}

    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $this->dropTable('article_category');
    }
}
