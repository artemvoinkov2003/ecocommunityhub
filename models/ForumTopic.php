<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forum_topic".
 *
 * @property int $id
 * @property int $section_id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property ForumMessage[] $forumMessages
 * @property ForumSection $section
 */
class ForumTopic extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forum_topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'title', 'content', 'author_id'], 'required'],
            [['section_id', 'author_id'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForumSection::class, 'targetAttribute' => ['section_id' => 'id']],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'section_id' => Yii::t('app', 'Раздел'),
            'title' => Yii::t('app', 'Название'),
            'content' => Yii::t('app', 'Содержимое'),
            'author_id' => Yii::t('app', 'Автор'),
            'created_at' => Yii::t('app', 'Создано'),
            'updated_at' => Yii::t('app', 'Обновлено'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[ForumMessages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getForumMessages()
    {
        return $this->hasMany(ForumMessage::class, ['topic_id' => 'id']);
    }

    /**
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(ForumSection::class, ['id' => 'section_id']);
    }

    public function getMessagesCount()
    {
        return $this->hasMany(ForumMessage::class, ['topic_id' => 'id'])->count();
    }

    public function getLastMessage()
    {
        return $this->hasOne(ForumMessage::class, ['topic_id' => 'id'])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(1);
    }
    
    
    public function getText()
    {
        return $this->content;
    }
    
    
    public function setText($value)
    {
        $this->content = $value;
    }

}
