<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Source */

$this->title = 'Изменить источник: ' . $model->source_name;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Источники', 'url' => 'index'],
        ['label' => $model->source_name, 'url' => ['view', 'id' => $model->id]],
        ['label' => 'Изменить'],
    ],
]);
?>
<div class="source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
