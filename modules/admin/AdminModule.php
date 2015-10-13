<?php

namespace app\modules\admin;
use Yii;

class AdminModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        // initialize the module with the configuration loaded from config.php
        // Load configuration files
        \Yii::configure($this, require( Yii::getAlias('@app') . '/config/module-admin-config.php'));

        // Set Components
        \Yii::$app->setComponents([
            'authManager' => [
                'class' => '\yii\rbac\DbManager',
                'cache' => 'cache'
            ],
            'user' => [
                'class' => '\yii\web\User',
                'identityClass' => 'app\models\User',
                'enableAutoLogin' => false,
                'loginUrl' => '/admin/default/login',
                'idParam' => '__admin',
                'authTimeoutParam' => '__adminExpire',
                'absoluteAuthTimeoutParam' => '__adminAbsoluteExpire',
                'returnUrlParam' => '__adminReturnUrl',
            ],
            'urlManager' => [
                'class'=>'yii\web\urlManager',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [

                ],
            ],

        ]);

        // Customer Error Page
        \Yii::$app->errorHandler->errorAction = 'admin/default/error';

        // Set default layout
        $this->layout = 'admin';
        Yii::$app->language='vi';
    }
}
