<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\forms\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="box box-body box-primary">
    <div class="form-search">
        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>
        <ul>
            <li class="form-label"><b>Tìm kiếm</b></li>
            <li class="form-item">
                <?= Html::activeInput('text', $model, 'id', array('placeholder' => $model->getAttributeLabel('id'), 'style' => 'width:100px')) ?>
            </li>
            <li class="form-item">
                <?= Html::activeInput('text', $model, 'username', array('placeholder' => $model->getAttributeLabel('username'), 'style' => 'width:150px')) ?>
            </li>
            <li class="form-item">
                <?= Html::activeInput('text', $model, 'email', array('placeholder' => $model->getAttributeLabel('email'), 'style' => 'width:150px')) ?>
            </li>
            <li class="form-item">
                <?= Html::activeInput('text', $model, 'phone', array('placeholder' => $model->getAttributeLabel('phone'), 'style' => 'width:150px')) ?>
            </li>
            <li class="form-item">
                <?= Html::activeDropDownList($model, 'status', \app\models\User::getStatusLabels(), array('prompt' => 'Trạng thái', 'style' => 'width:150px')) ?>
            </li>
            <li class="form-item">
                <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </li>
        </ul>
        <?php ActiveForm::end(); ?>
    </div>
</div>
