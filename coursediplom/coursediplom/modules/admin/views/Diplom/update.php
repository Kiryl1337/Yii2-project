<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Diplom */
/* @var $diplom_sources app\models\Source */

$this->title = 'Изменить диплом: ' . $model->title;
echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Дипломы', 'url' => 'index'],
        ['label' => $model->title, 'url' => ['view', 'id' => $model->id]],
        ['label' => 'Изменить'],
    ],
]);
?>
<div class="diplom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formUpdate', [
        'model' => $model,
        'diplom_sources' => $diplom_sources,
    ]) ?>

</div>
