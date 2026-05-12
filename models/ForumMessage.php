<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forum_message".
 *
 * @property int $id
 * @property int $topic_id
 * @property string $content
 * @property int $author_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property ForumTopic $topic
 */
class ForumMessage extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%forum_message}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic_id', 'content', 'author_id'], 'required'],
            [['topic_id', 'author_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['topic_id'], 'exist', 'skipOnError' => true, 'targetClass' => ForumTopic::class, 'targetAttribute' => ['topic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'topic_id' => Yii::t('app', 'Тема'),
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
     * Gets query for [[Topic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(ForumTopic::class, ['id' => 'topic_id']);
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
