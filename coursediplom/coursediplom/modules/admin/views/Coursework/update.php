<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Coursework */
/* @var $coursework_sources app\models\Source */

$this->title = 'Изменить курсовую: ' . $model->title;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
            ['label' => 'Курсовые', 'url' => 'index'],
            ['label' => $model->title, 'url' => ['view', 'id' => $model->id]],
            ['label' => 'Изменить'],
    ],
]);
?>
<div class="coursework-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'model' => $model,
        'coursework_sources' => $coursework_sources,
    ]) ?>

</div>
