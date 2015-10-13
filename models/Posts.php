<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $type
 * @property integer $created_by
 * @property string $author
 * @property integer $create_at
 * @property integer $updated_at
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'type', 'created_by', 'create_at', 'updated_at'], 'integer'],
            [['author'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('posts', 'ID'),
            'status' => Yii::t('posts', 'Status'),
            'type' => Yii::t('posts', 'Type'),
            'created_by' => Yii::t('posts', 'Created By'),
            'author' => Yii::t('posts', 'Author'),
            'create_at' => Yii::t('posts', 'Create At'),
            'updated_at' => Yii::t('posts', 'Updated At'),
        ];
    }
}
