<?php

/* @var $dataProvider \yii\data\ActiveDataProvider*/
$coursework=$dataProvider->getModels();
?>
<div class="body-content">

    <?= \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'itemView'=>'_one',
    ]); ?>

</div>