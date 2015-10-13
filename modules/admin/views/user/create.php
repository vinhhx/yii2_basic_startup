<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */

$this->title = 'Tạo quản trị viên';
$this->params['pageTitle'] = $this->title;
$this->params['pageDescription'] = '';
$this->params['breadcrumbs'] = [
    'Danh sách quản trị viên' => ['index'],
    'Tạo mới'
];
?>
<div class="admin-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
