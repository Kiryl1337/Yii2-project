<?php

use app\models\Department;
use app\models\Group;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php if($model->role=='student'){ ?>
    <?= $form->field($model, 'id_group')->dropDownList(Group::getListGroup(), $params = [
        'prompt' => 'Выберите группу'
    ]) ?>
    <?} ?>

    <?php if($model->role=='teacher' || $model->role=='admin'){ ?>
    <?= $form->field($model, 'id_department')->dropDownList(Department::getListDepartment(), $params = [
        'prompt' => 'Выберите группу'
    ]) ?>
    <?} ?>

    <?= $form->field($model, 'is_teacher')->dropDownList(User::getIsTeacherList()) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList(User::getRolesArray()) ?>

    <?= $form->field($model, 'status')->dropDownList(User::getStatusesArray()) ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
