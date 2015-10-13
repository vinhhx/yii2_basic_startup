<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category_translation".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $lang_id
 * @property string $name
 * @property string $image_featured
 * @property integer $category_lang_status
 * @property string $category_meta_title
 * @property string $category_meta_description
 * @property string $category_meta_keyword
 * @property string $category_og_image
 * @property string $type_index
 * @property string $canonicial
 * @property string $type_follow
 */
class CategoryTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'category_lang_status'], 'integer'],
            [['lang_id'],'string','max'=>4],
            [['lang_id'],'filter','filter'=>'trim'],
            [['name', 'image_featured', 'category_meta_title', 'category_meta_description', 'category_meta_keyword', 'category_og_image', 'type_index', 'canonicial', 'type_follow'], 'string', 'max' => 255],
            [['category_id', 'lang_id'], 'unique', 'targetAttribute' => ['category_id', 'lang_id'], 'message' => 'The combination of Category ID and Lang ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('category', 'ID'),
            'category_id' => Yii::t('category', 'Category ID'),
            'lang_id' => Yii::t('category', 'Lang ID'),
            'name' => Yii::t('category', 'Name'),
            'image_featured' => Yii::t('category', 'Image Featured'),
            'category_lang_status' => Yii::t('category', 'Category Lang Status'),
            'category_meta_title' => Yii::t('category', 'Category Meta Title'),
            'category_meta_description' => Yii::t('category', 'Category Meta Description'),
            'category_meta_keyword' => Yii::t('category', 'Category Meta Keyword'),
            'category_og_image' => Yii::t('category', 'Category Og Image'),
            'type_index' => Yii::t('category', 'Type Index'),
            'canonicial' => Yii::t('category', 'Canonicial'),
            'type_follow' => Yii::t('category', 'Type Follow'),
        ];
    }
}
