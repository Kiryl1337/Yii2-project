<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\Breadcrumbs;
use \app\models\Group;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсовые';
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => ['label' => 'Курсовые'],
]);
?>
<div class="coursework-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать курсовую', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\FilterSerialColumn',
                'filterContent' =>'<h5><b>Поиск</b></h5>',
            ],

            'title',
            //'text:ntext',
            //['attribute'=>'url','format'=>'text'],
            [
                'attribute' => 'id_group',
                'value'=>'groupName',
                'filter' => Group::getListGroup(),
            ],
            ['attribute'=>'id_student','value'=>'studentFIO'],
            [
                'class' => 'yii\grid\FilterActionColumn',
                'contentOptions' => ['style' => 'white-space: nowrap; text-align: center; letter-spacing: 0.1em; max-width: 7em;'],
                'filterContent' =>Html::a('<i class="fa fa-refresh"></i> Сбросить', ['index'], ['class' => 'btn btn-primary', 'style' => 'background:#FF7373;']),
                'header'=> 'Действие',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


</div>
