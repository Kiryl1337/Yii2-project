<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Coursework */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Курсовые', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="coursework-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'text:raw',
            'studentFIO',
            'teacherFIO',
            'groupName',
            'sourcesAsString',
        ],
    ]) ?>
    <?php if($model->id_student!=null){?>
    <?= Html::a('Отзыв', ['view-comment', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Задание', ['view-task', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?}?>
</div>
