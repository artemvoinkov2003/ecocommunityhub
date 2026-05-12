<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event_registration}}`.
 */
class m250622_122515_create_event_registration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('event_registration', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'registration_date' => $this->dateTime()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-event_registration-event_id',
            'event_registration',
            'event_id',
            'events',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-event_registration-user_id',
            'event_registration',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-event_registration-event_id', 'event_registration');
        $this->dropForeignKey('fk-event_registration-user_id', 'event_registration');
        $this->dropTable('event_registration');
    }
}
