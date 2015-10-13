<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property integer $lang_id
 * @property string $company_name
 * @property string $company_about
 * @property string $company_address
 * @property string $company_phone
 * @property string $company_email
 * @property string $website_introduct
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lang_id'], 'string', 'max' => 4],
            [['lang_id'], 'filter', 'filter' => 'trim'],
            [['company_name', 'company_about', 'company_address', 'company_phone', 'company_email', 'website_introduct'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('company', 'ID'),
            'lang_id' => Yii::t('company', 'Lang ID'),
            'company_name' => Yii::t('company', 'Company Name'),
            'company_about' => Yii::t('company', 'Company About'),
            'company_address' => Yii::t('company', 'Company Address'),
            'company_phone' => Yii::t('company', 'Company Phone'),
            'company_email' => Yii::t('company', 'Company Email'),
            'website_introduct' => Yii::t('company', 'Website Introduct'),
        ];
    }

    public function behaviors()
    {
        return [TimestampBehavior::className()];
    }
}
