<?php

namespace app\modules\admin\controllers;

use app\components\controllers\AdminBaseController;
use app\modules\admin\forms\LoginForm;
use yii\web\Controller;
use Yii;
class DefaultController extends AdminBaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public  function  actionError(){
        return $this->render('error');
    }

    public function actionLogin()
    {
        $this->layout = 'login';
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout(false);

        return $this->redirect(Yii::$app->user->loginUrl);
    }
}
