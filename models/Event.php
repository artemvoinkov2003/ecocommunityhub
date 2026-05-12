<?php
// models/Event.php
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\Url;

class Event extends ActiveRecord
{
    public static function tableName()
    {
        return 'events';
    }

    public function attributeLabels()
{
    return [
        'title' => 'Название',
        'start_date' => 'Дата и время начала',
        'end_date' => 'Дата и время окончания',
        'location' => 'Место проведения',
        'description' => 'Описание',
        'category' => 'Категория',
        'color' => 'Цвет',
    ];
}

    public function rules()
    {
        return [
            [['title', 'start_date', 'end_date', 'location', 'description'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['description'], 'string'],
            [['title', 'location'], 'string', 'max' => 255],
            [['category', 'image'], 'string', 'max' => 100],
            [['color'], 'string', 'max' => 7],
        ];
    }

    public function getRegistrations()
    {
        return $this->hasMany(EventRegistration::class, ['event_id' => 'id']);
    }

    public function isUserRegistered($userId)
    {
        return $this->getRegistrations()
            ->where(['user_id' => $userId])
            ->exists();
    }

    
    public function afterFind()
    {
        parent::afterFind();
        $this->start_date = date('d.m.Y H:i', strtotime($this->start_date));
        $this->end_date = date('d.m.Y H:i', strtotime($this->end_date));
    }
    
}