<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

$this->title = 'Обновить сайт';

echo Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => ['/admin']],
    'links' => ['label' => 'Обновить сайт'],
]);
?>

<div class="upload-index">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'method' => 'post']
    ]);
    ?>

    <?= $form->field($model, 'file')->Label('Выберите файл')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>