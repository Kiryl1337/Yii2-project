<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Group */

$this->title = 'Создать группу';
echo \yii\widgets\Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => [
        ['label' => 'Группы', 'url' => 'index'],
        ['label' => $this->title],
    ],
]);
?>
<div class="group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
