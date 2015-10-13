<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $type
 * @property integer $created_by
 * @property string $author
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'type', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('category', 'ID'),
            'status' => Yii::t('category', 'Status'),
            'type' => Yii::t('category', 'Type'),
            'created_by' => Yii::t('category', 'Created By'),
            'author' => Yii::t('category', 'Author'),
            'created_at' => Yii::t('category', 'Created At'),
            'updated_at' => Yii::t('category', 'Updated At'),
        ];
    }
}
