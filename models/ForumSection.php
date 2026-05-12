<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forum_section".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ForumTopic[] $forumTopics
 */
class ForumSection extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forum_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'default', 'value' => null],
            [['title'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'description' => Yii::t('app', 'Описание'),
            'created_at' => Yii::t('app', 'Создано'),
            'updated_at' => Yii::t('app', 'Обновлено'),
        ];
    }

    /**
     * Gets query for [[ForumTopics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForumTopics()
    {
        return $this->hasMany(ForumTopic::class, ['section_id' => 'id']);
    }

    public function getTopicsCount()
    {
        return $this->hasMany(ForumTopic::class, ['section_id' => 'id'])->count();
    }

    public function getMessagesCount()
    {
        return ForumMessage::find()
            ->joinWith('topic')
            ->where(['forum_topics.section_id' => $this->id])
            ->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLastTopic()
    {
        return $this->hasOne(ForumTopic::class, ['section_id' => 'id'])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(1);
    }

    public function getLastMessage()
    {
        return $this->hasOne(ForumMessage::class, ['topic_id' => 'id'])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(1);
    }
}
