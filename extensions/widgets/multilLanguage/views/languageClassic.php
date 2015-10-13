<?php
/**
 * Created by PhpStorm.
 * User: vinhhx
 * Date: 11-Oct-15
 * Time: 10:19 AM
 */
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
<div class="multillanguages">
    <?php
    list($route,$parmas)=Yii::$app->getUrlManager()->parseRequest(Yii::$app->getRequest());
    $parmas=ArrayHelper::merge($_GET,$parmas);
    $url=isset($parmas["route"])?$parmas["route"]:$route;
    $html ="";
    $ul='<ul style="display: inline-flex; float: left; list-style: outside none none; margin: 0; padding: 0;">';
    $html.=$url;
    foreach($languages as $key=>$lang){
        if($key!=$currentLanguage){
            $url_lang=Yii::$app->urlManager->createUrl(ArrayHelper::merge($parmas,[$url,'lang'=>$key]));
            $url_image=Url::to('@web/images/flags/'.$image_type.'/'.$key.'.png');
            $html.='
                <li style="margin-right:10px">
                <a class="active" href="'.$url_lang.'"style="text-decoration: none;">
                 <img alt="'.$lang.'" class="lang-flag" src="'.$url_image.'" title="'.$lang.'" width="'.$width.'">
                 </a>
                 </li>
            ';
        }
    }
    $html.="</ul>";
    echo $html;
    ?>
</div>
