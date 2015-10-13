<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts_image".
 *
 * @property integer $id
 * @property string $image
 * @property integer $status
 * @property integer $upload_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostsImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'upload_by', 'created_at', 'updated_at'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('posts', 'ID'),
            'image' => Yii::t('posts', 'Image'),
            'status' => Yii::t('posts', 'Status'),
            'upload_by' => Yii::t('posts', 'Upload By'),
            'created_at' => Yii::t('posts', 'Created At'),
            'updated_at' => Yii::t('posts', 'Updated At'),
        ];
    }
}
