<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use \kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Diplom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diplom-form">

    <?php $form = ActiveForm::begin(); ?>


            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'text')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugins' => [
                        'clips',
                        'fullscreen',
                    ],

                ],

            ]); ?>


            <?= $form->field($model, 'id_group')->dropDownList(
                \app\models\Group::getListGroup(),
                [
                    'prompt'=>'Выберите группу',
                    'onchange'=>'
                    $.post("lists?id='.'"+$(this).val(), function( data ){
                        $("select#diplom-id_student").html(data);
                    });'
                ]) ?>

            <?= $form->field($model, 'id_student')->dropDownList(
                \yii\helpers\ArrayHelper::map(\app\models\User::find()->where('is_teacher=0')->all(),'id','FIO'),
                [
                    'prompt'=>'Выберите студента',
                ]) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
