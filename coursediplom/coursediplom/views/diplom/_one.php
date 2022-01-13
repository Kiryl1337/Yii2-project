<?php

?>
<div class="col-lg-12">
    <h2><?=$model->title?>
    </h2>
    <h4>
            <?php if($model->id_teacher!=NULL){?>
         <b>Преподаватель: </b><?=$model->teacher->FIO ?><br>

            <?php }?>
    <?php if($model->id_student!=NULL):?>
        <b>Студент: </b><?=$model->student->FIO ?> <br>
        <?php else: ?>
        <b>Студент:</b> Нет студента <br>
    <?php endif; ?>
    <b>Группа: </b> <?=$model->group->name ?>

    </h4>


    <?= \yii\bootstrap\Html::a('Подробнее',['diplom/one','id'=>$model->id],['class'=>'btn btn-success'])?>
    <hr>
</div>
