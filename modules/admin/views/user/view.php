<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Thông tin quản trị viên';
$this->params['pageTitle'] = $this->title;
$this->params['pageDescription'] = '';
$this->params['breadcrumbs'] = [
    'Danh sách quản trị viên' => ['index'],
    'Chi tiết'
];
?>
<div class="admin-view">

    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <?=
                    DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'username',
                            'email:email',
                            'phone',

                            [
                                'label' => $model->getAttributeLabel('status'),
                                'value' => \app\models\User::getStatusLabels()[$model->status],
                            ],
                            'created_at:datetime',
                            'updated_at:datetime',
                        ],
                    ])
                    ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::a('Cập nhật', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Phân quyền', ['permission', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
    </div>

</div>
