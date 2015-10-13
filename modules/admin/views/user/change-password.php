<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Đổi mật khẩu quản trị';
$this->params['pageTitle'] = $this->title;
$this->params['pageDescription'] = '';
$this->params['breadcrumbs'] = [
    'Đổi mật khẩu của tôi'
];
?>
<div class="post-update box">
    <div class="box-body">
        <div class="page-form">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'currentPassword')->passwordInput() ?>
            <?= $form->field($model, 'newPassword')->passwordInput() ?>
            <?= $form->field($model, 'newPasswordConfirmation')->passwordInput() ?>

            <div class="form-group">
                <label class="control-label"></label>
                <?= Html::submitButton('Đổi mật khẩu', ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
