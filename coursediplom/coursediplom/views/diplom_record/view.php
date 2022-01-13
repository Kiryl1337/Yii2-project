<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diplom */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Дипломы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diplom-view">

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
    <?}?>
</div>
