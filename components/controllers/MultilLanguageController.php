<?php
/**
 * Created by PhpStorm.
 * User: vinhhx
 * Date: 11-Oct-15
 * Time: 9:15 AM
 */
namespace app\components\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;

class MultilLanguageController extends Controller
{
    public function  init()
    {
        parent::init();
        //Check post request
        if (isset($_POST['lang'])) {
            $lang = $_POST['lang'];
            $mutilLanguageReturnUrl = $_POST['lang'];
            $this->redirect($mutilLanguageReturnUrl);
        }
        //Set the application language if provided GET, session, or cookie
        if (isset($_GET['lang'])) {
            Yii::$app->language = $_GET['lang'];
            Yii::$app->session->set('lang', $_GET['lang']);
            $cookie = new Cookie([
                'name' => 'lang',
                'value' => $_GET['lang'],
            ]);
            $cookie->expire = time() + 31536000; //1year
            Yii::$app->response->cookies->add($cookie);
        } elseif (Yii::$app->session->get('lang')) {
            Yii::$app->language = Yii::$app->session->get('lang');

        } elseif (Yii::$app->request->cookies->get('lang')) {
            Yii::$app->language = Yii::$app->request->cookies['lang']->value;
        }else{
            //default ngôn ngữ vi
            Yii::$app->language='vi';
            Yii::$app->session->set('lang','vi');
            $cookie = new Cookie([
                'name' => 'lang',
                'value' =>'vi',
            ]);
            $cookie->expire = time() + 31536000; //1year
            Yii::$app->response->cookies->add($cookie);
        }

    }

    public function createMultilLangReturnUrl($lang = 'vi', $params = [])
    {
        if(count($_GET)>0){
            $arr=$_GET;
            $arr['lang']=$lang;
        }else{
            $arr=['lang'=>$lang];
        }
        $param_temp=[
            $this->module->requestedRoute,
            'lang'=>$arr['lang'],
        ];
        $params=array_merge($param_temp,$params);
        $urlManager=Yii::$app->urlManager;
        return $urlManager->createUrl($params);
    }
}