<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\SignupForm */

use app\models\Department;
use app\models\Group;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Заполните поля для регистрации:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php \yii\widgets\Pjax::begin(); ?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                 <?= $form->field($model, 'FIO')->label('ФИО')->textInput(['autofocus' => true]) ?>

                 <?= $form->field($model, 'is_teacher')->checkbox(
                [
					'id'=>'checkBox',
                    'checked' => false,
                    'value' => 1,
                    'uncheckValue' => 0,
                ]);
				?>
				</div>
				<div id="id_group">
                 <?= $form->field($model, 'id_group')->label('Выберите группу')->dropDownList(Group::getListGroup()) ?>
				</div>

                <div id="id_department" style="display:none">
                <?= $form->field($model, 'id_department')->label('Выберите кафедру')->dropDownList(Department::getListDepartment()) ?>
                </div>
				
				<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
				<script>
				$('#checkBox').click(function(){
					if ($(this).is(':checked')){
						$('#id_group').fadeOut();
                        $('#id_department').fadeIn();
					} else {
						$('#id_group').fadeIn();
                        $('#id_department').fadeOut();
					}
				});
				</script>

                 <?= $form->field($model, 'username')->label('Логин')->textInput() ?>

                 <?= $form->field($model, 'email') ?>

                 <?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>

                 <?= $form->field($model, 'confirm_password')->passwordInput()->Label('Подтверждение пароля') ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            <?php \yii\widgets\Pjax::end(); ?>
        </div>
    </div>

</div>

