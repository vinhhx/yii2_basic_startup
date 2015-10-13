<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner_translation".
 *
 * @property integer $id
 * @property string $lang_id
 * @property integer $banner_id
 * @property string $image
 * @property string $title
 * @property string $summary
 * @property integer $posts_lang_status
 * @property string $url
 * @property string $url_target
 * @property string $type_follow
 */
class BannerTranslation extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'],'required'],
            [['banner_id', 'posts_lang_status'], 'integer'],
            [['lang_id'], 'string', 'max' => 4],
            [['title', 'summary', 'url', 'url_target', 'type_follow','image'], 'string', 'max' => 255],
            [['banner_id', 'lang_id'], 'unique', 'targetAttribute' => ['banner_id', 'lang_id'], 'message' => 'The combination of Lang ID and Banner ID has already been taken.'],
            [['file'], 'file', 'extensions' => 'jpg, png, gif', 'mimeTypes' => 'image/jpeg, image/png, image/gif', 'maxSize' => 1048576 /* 1 Mb */],
            [['file'],'required','on'=>'create'],
            [['file'],'image','minWidth'=>400,'minHeight'=>100],
            [['file'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('banner', 'ID'),
            'lang_id' => Yii::t('banner', 'Lang ID'),
            'banner_id' => Yii::t('banner', 'Banner ID'),
            'image' => Yii::t('banner', 'Image'),
            'file' => Yii::t('banner', 'File'),
            'title' => Yii::t('banner', 'Title'),
            'summary' => Yii::t('banner', 'Summary'),
            'posts_lang_status' => Yii::t('banner', 'Posts Lang Status'),
            'url' => Yii::t('banner', 'Url'),
            'url_target' => Yii::t('banner', 'Url Target'),
            'type_follow' => Yii::t('banner', 'Type Follow'),
        ];
    }
}
