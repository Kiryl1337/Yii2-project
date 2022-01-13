<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diplom */

$this->title = 'Запись на диплом: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Дипломы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Запись';
?>
<div class="diplom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'text:raw',
            'teacherFIO',
            'groupName',
            'sourcesAsString',
        ],
    ]) ?>

</div>
<?php $form = \yii\widgets\ActiveForm::begin(); ?>

<?php if($model->id_student==null){?>
    <?=$form->field($model, 'studentFIO')->checkbox(['label' => 'Вы точно хотите записаться на данный диплом?','required'=>'required']); ?>
    <div class="form-group">
        <?= Html::submitButton('Записаться', ['class' => 'btn btn-success']) ?>
    </div>
<? } else if($model->id_student==Yii::$app->user->identity->id){?>
    <?=$form->field($model, 'studentFIO')->checkbox(['label' => 'Вы точно хотите отписаться от данного диплома?','required'=>'required']); ?>
    <div class="form-group">
        <?= Html::submitButton('Отписаться', ['class' => 'btn btn-danger']) ?>
    </div>
<? } else {?>
    <div class="form-group">
        <h3 style="color:red;">На данный диплом уже записан студент. Выберите другой диплом.</h3>
    </div>
<?}  ?>

<?php \yii\widgets\ActiveForm::end(); ?>