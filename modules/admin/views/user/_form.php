<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SystemStock;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <div class="box box-primary">
        <div class="box-body">
            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'disabled' => $model->isNewRecord ? false : true]) ?>

                    <?= $model->isNewRecord ? $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) : '' ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'disabled' => $model->isNewRecord ? false : true]) ?>

                    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'status')->dropDownList($model->getStatusLabels()) ?>
                </div>
                <div class="col-md-4">
                    <?php if (!$model->isNewRecord): ?>
                        <div class="form-group">
                            <?=
                            Html::a('Đổi mật khẩu', '#collapse-password-field', [
                                'class' => 'btn btn-primary',
                                'role' => 'button',
                                'data-toggle' => 'collapse',
                                'aria-expanded' => 'false',
                                'aria-controls' => 'collapse-password-field'
                            ])
                            ?>
                        </div>
                        <div class="collapse" id="collapse-password-field">
                            <div class="well">

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<textarea name="" id="password-template" cols="30" rows="10" style="display: none;">
    <?php $model->password_hash = null;
    echo $form->field($model, 'password_hash')->passwordInput(['maxlength' => true])
    ?>
</textarea>
<?php
$isPost = isset(Yii::$app->request->post('Admin')['password_hash']) ? 1 : 0;
$js = <<< JS
    (function($){
        $('#collapse-password-field').on('shown.bs.collapse', function () {
            $('.well').html($('#password-template').val());
            $('.well').find('input:first').focus();
        }).on('hidden.bs.collapse', function () {
            $('.well').html('');
        });

        if({$isPost}){
            $('#collapse-password-field').collapse('show');
        }
    })(jQuery);
JS;
$this->registerJs($js);
?>