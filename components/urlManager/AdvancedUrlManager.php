<?php
/**
 * Created by PhpStorm.
 * User: vinhhx
 * Date: 11-Oct-15
 * Time: 10:34 AM
 */
namespace app\components\urlManager;

use Yii;
use yii\web\UrlManager;

class AdvancedUrlManager extends UrlManager
{
    public  function createUrl($params){
        if(!isset($params["lang"])){
            if(Yii::$app->session->has('lang'))
                Yii::$app->language=Yii::$app->session->get('lang');
            elseif(isset(Yii::$app->request->cookies["lang"]))
                Yii::$app->language=Yii::$app->request->cookies["lang"]->value;
            else
            $params['lang']=Yii::$app->language;
        }
        return parent::createUrl($params);
    }
}