<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner_image".
 *
 * @property integer $id
 * @property integer $banner_id
 * @property string $image
 * @property integer $status
 * @property integer $upload_by
 * @property integer $created_at
 * @property integer $updated_at
 */
class BannerImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['banner_id', 'status', 'upload_by', 'created_at', 'updated_at'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('banner', 'ID'),
            'banner_id' => Yii::t('banner', 'Banner ID'),
            'image' => Yii::t('banner', 'Image'),
            'status' => Yii::t('banner', 'Status'),
            'upload_by' => Yii::t('banner', 'Upload By'),
            'created_at' => Yii::t('banner', 'Created At'),
            'updated_at' => Yii::t('banner', 'Updated At'),
        ];
    }
}
