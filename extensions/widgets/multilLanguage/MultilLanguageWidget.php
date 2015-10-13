<?php
/**
 * Created by PhpStorm.
 * User: vinhhx
 * Date: 11-Oct-15
 * Time: 10:03 AM
 */
namespace app\extensions\widgets\multilLanguage;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;

class MultilLanguageWidget extends Widget
{
    public  $calling_controller;
    public  $image_type;
    public $widget_type;
    public  $width;

    public  function init(){
        parent::init();
        //if !params language
        if(!isset(Yii::$app->params["languages"])){
            throw new InvalidConfigException("You must define params languages");
        }
        //widget type
        if(!$this->widget_type){
            $this->widget_type='classic';
        }
        //image type
        if(!$this->image_type)
            $this->image_type='classic';

        if(!$this->width)
            $this->width='24';
    }

    public  function run($params=[]){
        $currentLanguage=Yii::$app->language;
        $langugages=Yii::$app->params['languages'];
        switch($this->widget_type){
            case "selector":
                $renderView='languageSelector';
                break;
            default:
                $renderView='languageClassic';
        }
        return $this->render($renderView,[
            'image_type'=>$this->image_type,
            'width'=>$this->width,
            'currentLanguage'=>$currentLanguage,
            'languages'=>$langugages,
            'controller'=>$this->calling_controller
        ]);
    }
}