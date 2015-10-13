<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts_category".
 *
 * @property integer $id
 * @property integer $posts_id
 * @property integer $category_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class PostsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posts_id', 'category_id', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('posts', 'ID'),
            'posts_id' => Yii::t('posts', 'Posts ID'),
            'category_id' => Yii::t('posts', 'Category ID'),
            'created_at' => Yii::t('posts', 'Created At'),
            'updated_at' => Yii::t('posts', 'Updated At'),
        ];
    }
}
