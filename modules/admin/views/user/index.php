<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('user','Users');
$this->params['pageTitle'] = $this->title ;
$this->params['pageDescription'] = '';
$this->params['breadcrumbs'] = [
    Yii::t('user','Users') => Url::to('/admin/user'),
];
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="box box-info">
    <div class="box-body">
        <div class="tools clearfix text-right">
            <?= Html::a('Tạo mới',['create'],['class'=>'btn btn-success']) ?>
        </div>

        <?=
            \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'username',
                    'email',
                    'phone',
                    [
                        'attribute' => 'status',
                        'label' => 'Trạng thái',
                        'filter' => \app\models\User::getStatusLabels(),
                        'content' => function ($data) {
                            /* @var $data app\models\User */
                            return Html::tag('span', isset($data::getStatusLabels()[$data->status])? $data::getStatusLabels()[$data->status]:"--", [
                                'style' => 'color: green;font-weight:bold'
                            ]);
                        }
                    ],
                    'created_at:date',
                    // 'updated_at',
                    ['class' => 'yii\grid\ActionColumn'],
                ],

            ]);
            ?>
    </div>
</div>


