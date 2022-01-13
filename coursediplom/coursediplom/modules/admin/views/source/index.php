<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Источники';
echo \yii\widgets\Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin/site/index']],
    'links' => ['label' => 'Источники'],
]);
?>
<div class="source-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать источник', ['create'], ['class' => 'btn btn-success']) ?>
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

            ['attribute'=>'id_section','value'=>'sectionName'],
            'source_name',

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
