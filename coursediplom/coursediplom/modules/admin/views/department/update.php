<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'Изменить кафедру: ' . $model->department_name;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Кафедры', 'url' => 'index'],
        ['label' => $model->department_name, 'url' => ['view', 'id' => $model->id]],
        ['label' => 'Изменить'],
    ],
]);
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
