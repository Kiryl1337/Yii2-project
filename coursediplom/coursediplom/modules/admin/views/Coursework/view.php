<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Coursework */

$this->title = $model->title;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Курсовые', 'url' => 'index'],
        ['label' => $this->title],
    ],
]);
\yii\web\YiiAsset::register($this);
?>
<div class="coursework-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту курсовую?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Добавить источник(и)', ['edit-sources', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'text:raw',
            'groupName',
            'studentFIO',
            'sourcesAsString',
        ],
    ]) ?>

    <?= Html::a('Отзыв', ['view-comment', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    <?= Html::a('Задание', ['view-task', 'id' => $model->id], ['class' => 'btn btn-default']) ?>


</div>
