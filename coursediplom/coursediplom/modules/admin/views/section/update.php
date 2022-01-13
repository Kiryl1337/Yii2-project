<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Section */

$this->title = 'Изменить раздел: ' . $model->section_name;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Разделы', 'url' => 'index'],
        ['label' => $model->section_name, 'url' => ['view', 'id' => $model->id]],
        ['label' => 'Изменить'],
    ],
]);
?>
<div class="section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
