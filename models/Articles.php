<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $category_id
 * @property int|null $views
 * @property int $author_id
 * @property int $status
 * @property string|null $image
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $author
 * @property ArticleCategory $category0
 * @property Reviews[] $reviews
 */
class Articles extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'default', 'value' => null],
            [['views'], 'default', 'value' => 0],
            [['status'], 'default', 'value' => 1],
            [['title', 'content', 'category_id', 'author_id'], 'required'],
            [['content'], 'string'],
            [['category_id', 'views', 'author_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 100],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticleCategory::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'content' => Yii::t('app', 'Содержание'),
            'category_id' => Yii::t('app', 'Категория'),
            'views' => Yii::t('app', 'Просмотры'),
            'author_id' => Yii::t('app', 'Автор'),
            'status' => Yii::t('app', 'Статус'),
            'image' => Yii::t('app', 'Изображение'),
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
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategory::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Reviews::class, ['article_id' => 'id']);
    }

}
