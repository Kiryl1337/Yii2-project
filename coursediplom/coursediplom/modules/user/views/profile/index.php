<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\user\Module;


$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(Yii::$app->user->identity->role=='student'){ ?>
        <?= Html::a('Редактирование группы', ['update'], ['class' => 'btn btn-primary']) ?>
        <? } if(Yii::$app->user->identity->role=='teacher'){ ?>
            <?= Html::a('Редактирование кафедры', ['update'], ['class' => 'btn btn-primary']) ?>
        <?} ?>
        <?= Html::a('Сменить пароль', ['password-change'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php if(Yii::$app->user->identity->role=='student'){ ?>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'FIO',
            'username',
            'groupName',
        ],
    ]) ?>
    <? }else if(Yii::$app->user->identity->role=='teacher'){ ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'FIO',
            'username',
            'departmentName'
        ],
    ]) ?>
    <?} ?>

</div>