<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = 'Изменить факультет: ' . $model->faculty_name;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Факультеты', 'url' => 'index'],
        ['label' => $model->faculty_name, 'url' => ['view', 'id' => $model->id]],
        ['label' => 'Изменить'],
    ],
]);
?>
<div class="faculty-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
