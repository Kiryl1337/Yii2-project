<?php

use vova07\imperavi\Widget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use \app\models\Source;
use \app\models\Section;

/* @var $this yii\web\View */
/* @var $model app\models\Coursework */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coursework-form">

    <?php $form = ActiveForm::begin(); ?>


		    <?= $form->field($model, 'section_name')->dropDownList(
        Section::getListSections(),
          [
                'prompt'=>'Выберите раздел',
                'onchange'=>'
                    $.post("lists1?id='.'"+$(this).val(), function( data ){
                        $("select#diplom-new_sources").html(data);
                    });'
            ]) ?>

    <?=
    $form->field($model, 'new_sources')->widget(Select2::classname(), [
        'data' =>  Source::getListSources(),
        'options' => [
            'placeholder' => 'Выберите источник ...',
            'multiple' => true
        ],
        'pluginOptions'=>[
            'allowClear'=>true,
            'tags'=>true,
        ],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
