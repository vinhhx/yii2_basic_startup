<?php
/**
 * Created by PhpStorm.
 * User: vinhhx
 * Date: 06-Oct-15
 * Time: 1:01 AM
 */
namespace app\components\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class AdminBaseController extends Controller
{

    public function beforeAction($action) {
        Yii::$app->setHomeUrl('/admin');

        if (Yii::$app->user->isGuest && Yii::$app->request->getUrl() !== Url::to(Yii::$app->user->loginUrl)) {
            return $this->redirect(Yii::$app->user->loginUrl);
        }

//        $auth = Yii::$app->authManager;
//
//        $controllerName = Yii::$app->controller->id;
//        $actionName = Yii::$app->controller->action->id;
//        $userId = Yii::$app->user->id;
//
//        $operation = $controllerName.'/'.$actionName;
//
//        if(in_array($operation, ['default/login', 'default/index'])){
//            return true;
//        }
//
//        $parent = parent::beforeAction($action);
//
//        // Bỏ check phân quyền nếu tài khoản là system-admin
//        $isSystemAdmin = $auth->getAssignment(HZ_RBAC_FULL, $userId);
//        if($isSystemAdmin){
//            return $parent;
//        }
//
//        if($auth->checkAccess($userId, $operation)){
//            return $parent;
//        }
//
//        echo $this->render('/default/error', [
//            'name' => 'Quyền truy cập bị từ chối',
//            'message' => 'Quyền truy cập bị từ chối',
//            'exception' => []
//        ]);
//        return false;
        // khi nao mở phân quyền  thì dóng dóng dưới vì ở trên đã check

        return parent::beforeAction($action);
    }

}