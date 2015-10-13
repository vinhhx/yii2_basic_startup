<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "banner".
 *
 * @property integer $id
 * @property integer $status
 * @property integer $type
 * @property integer $created_by
 * @property string $author
 * @property integer $created_at
 * @property integer $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;
    const STATUS_DELETED = 2;

    const TYPE_HOME=1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'],'required'],
            [['status', 'type', 'created_by', 'created_at', 'updated_at', 'sort'], 'integer'],
            [['author', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('banner', 'ID'),
            'name' => Yii::t('banner', 'Name'),
            'status' => Yii::t('banner', 'Status'),
            'type' => Yii::t('banner', 'Type'),
            'sort' => Yii::t('banner', 'Sort'),
            'created_by' => Yii::t('banner', 'Created By'),
            'author' => Yii::t('banner', 'Author'),
            'created_at' => Yii::t('banner', 'Created At'),
            'updated_at' => Yii::t('banner', 'Updated At'),
        ];
    }

    public function behaviors()
    {
        return [TimestampBehavior::className()];
    }

    static function getStatusLabel()
    {
        return [
            self::STATUS_ACTIVE => "Hiển thị",
            self::STATUS_DEACTIVE => 'Ẩn'
        ];
    }
    static function getTypeLabels(){
        return [
            self::TYPE_HOME=>"Trang chủ",
        ];
    }
}
