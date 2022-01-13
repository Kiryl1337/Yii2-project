<?php

use app\models\Group;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseworkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Курсовые';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coursework-index">

    <h1><?= Html::encode($this->title) ?></h1>
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

            'title',
            //'text:ntext',
            //['attribute'=>'url','format'=>'text'],
          //  ['attribute'=>'id_student','value'=>'studentFIO'],
		  [
			'attribute'=>'id_student',
			'value'=>'student.FIO',
		  ],
            ['attribute'=>'id_teacher','value'=>'teacherFIO'],
            [
                'class' => 'yii\grid\FilterActionColumn',
                'contentOptions' => ['style' => 'white-space: nowrap; text-align: center; letter-spacing: 0.1em; max-width: 7em;'],
                'filterContent' =>Html::a('<i class="fa fa-refresh"></i> Сбросить', ['index'], ['class' => 'btn btn-primary', 'style' => 'background:#FF7373;']),
                'header'=> 'Действие',
                'template'=>'{view} {update}',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/coursework_record/view','id'=>$model['id']]);
                        return \yii\helpers\Html::a( ' <span class="btn btn-primary">Просмотр</span>', $customurl,
                            ['title' => Yii::t('yii','View')]);
                    },
                    'update'=>function ($url, $model) {
                        $customurl=Yii::$app->getUrlManager()->createUrl(['/coursework_record/update','id'=>$model['id']]);
                        return \yii\helpers\Html::a( ' <span class="btn btn-success">Записаться(Отписаться)</span>', $customurl,
                            ['title' => Yii::t('yii','Записаться(Отписаться)')]);
                    },

                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
