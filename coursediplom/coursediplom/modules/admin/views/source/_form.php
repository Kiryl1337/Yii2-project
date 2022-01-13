<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\Section;


/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_section')->dropDownList(
        Section::getListSections(),
        [
            'prompt'=>'Выберите раздел',
        ]) ?>

    <?= $form->field($model, 'source_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
