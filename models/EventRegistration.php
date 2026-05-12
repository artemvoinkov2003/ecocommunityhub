<?php
// models/EventRegistration.php
namespace app\models;

use yii\db\ActiveRecord;

class EventRegistration extends ActiveRecord
{
    public static function tableName()
    {
        return 'event_registration';
    }

    public function rules()
    {
        return [
            [['event_id', 'user_id', 'registration_date'], 'required'],
            [['event_id', 'user_id'], 'integer'],
            [['registration_date'], 'safe'],
        ];
    }

    public function getEvent()
    {
        return $this->hasOne(Event::class, ['id' => 'event_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}