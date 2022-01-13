<?php

use app\models\Faculty;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кафедры';
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin/site/index']],
    'links' => ['label' => 'Кафедры'],
]);
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать кафедру', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\FilterSerialColumn',
                'filterContent' =>'<h5><b>Поиск</b></h5>',
            ],
            'department_name',
            [
                'attribute' => 'id_faculty',
                'value'=>'facultyName',
                'filter' => Faculty::getListFaculties(),
            ],
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
