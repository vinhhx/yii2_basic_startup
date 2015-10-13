<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\admin\forms\LoginForm */

$this->title = 'Login';

?>
<div class="login-box">
    <div class="login-logo">
        Hệ thống quản lý
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập vào hệ thống quản lý</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'username', ['template' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>{error}'])->textInput(['placeholder' => 'Tên đăng nhập'])->label(false); ?>
            </div>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'password', ['template' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>{error}'])->passwordInput(['placeholder' => 'Mật khẩu'])->label(false); ?>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div><!-- /.col -->
            </div>
        <?php ActiveForm::end(); ?>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

