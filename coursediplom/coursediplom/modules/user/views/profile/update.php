<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;


$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>
        <?php if(Yii::$app->user->identity->role=='student'){ ?>
        <?= $form->field($model, 'id_group')->dropDownList(\app\models\Group::getListGroup()) ?>
        <? } if(Yii::$app->user->identity->role=='teacher'){ ?>
        <?= $form->field($model, 'id_department')->dropDownList(\app\models\Department::getListDepartment()) ?>
        <? } ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>