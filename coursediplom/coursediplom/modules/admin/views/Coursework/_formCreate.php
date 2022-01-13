<?php

use app\models\User;
use vova07\imperavi\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\select2\Select2;
use \app\models\Group;
use \app\models\Section;

/* @var $this yii\web\View */
/* @var $model app\models\Coursework */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coursework-form">

    <?php $form = ActiveForm::begin(); ?>


            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'text')->widget(Widget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    'plugin' => [
                        'clips',
                        'fullscreen',
                    ],
                ],
            ]); ?>

            <?= $form->field($model, 'id_group')->dropDownList(
                Group::getListGroup(),
                [
                    'prompt'=>'Выберите группу',
                    'onchange'=>'
                    $.post("lists?id='.'"+$(this).val(), function( data ){
                        $("select#coursework-id_student").html(data);
                    });'
                ]) ?>

            <?= $form->field($model, 'id_student')->dropDownList(
                ArrayHelper::map(User::find()->where('is_teacher=0')->all(),'id','FIO'),
                [
                    'prompt'=>'Выберите студента',
                ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
