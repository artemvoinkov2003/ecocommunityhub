<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resource".
 *
 * @property int $id
 * @property string $name
 * @property string|null $type
 * @property string|null $description
 * @property string|null $location
 * @property string|null $coordinates
 * @property string $created_at
 * @property string $updated_at
 */
class Resource extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'description', 'location', 'coordinates'], 'default', 'value' => null],
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'type', 'location', 'coordinates'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'location' => Yii::t('app', 'Location'),
            'coordinates' => Yii::t('app', 'Coordinates'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}
