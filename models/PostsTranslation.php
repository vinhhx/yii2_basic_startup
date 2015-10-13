<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts_translation".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $posts_id
 * @property string $name
 * @property string $summary
 * @property string $description
 * @property string $image_featured
 * @property integer $posts_lang_status
 * @property string $posts_meta_title
 * @property string $posts_meta_description
 * @property string $posts_meta_keyword
 * @property string $posts_og_image
 * @property string $type_index
 * @property string $canonicial
 * @property string $type_follow
 */
class PostsTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posts_id', 'posts_lang_status'], 'integer'],
            [['description'], 'string'],
            [['lang_id'],'string','max'=>4],
            [['lang_id'],'filter','filter'=>'trim'],
            [['name', 'summary', 'image_featured', 'posts_meta_title', 'posts_meta_description', 'posts_meta_keyword', 'posts_og_image', 'type_index', 'canonicial', 'type_follow'], 'string', 'max' => 255],
            [['posts_id', 'lang_id'], 'unique', 'targetAttribute' => ['posts_id', 'lang_id'], 'message' => 'The combination of Lang ID and Posts ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('posts', 'ID'),
            'lang_id' => Yii::t('posts', 'Lang ID'),
            'posts_id' => Yii::t('posts', 'Posts ID'),
            'name' => Yii::t('posts', 'Name'),
            'summary' => Yii::t('posts', 'Summary'),
            'description' => Yii::t('posts', 'Description'),
            'image_featured' => Yii::t('posts', 'Image Featured'),
            'posts_lang_status' => Yii::t('posts', 'Posts Lang Status'),
            'posts_meta_title' => Yii::t('posts', 'Posts Meta Title'),
            'posts_meta_description' => Yii::t('posts', 'Posts Meta Description'),
            'posts_meta_keyword' => Yii::t('posts', 'Posts Meta Keyword'),
            'posts_og_image' => Yii::t('posts', 'Posts Og Image'),
            'type_index' => Yii::t('posts', 'Type Index'),
            'canonicial' => Yii::t('posts', 'Canonicial'),
            'type_follow' => Yii::t('posts', 'Type Follow'),
        ];
    }
}
