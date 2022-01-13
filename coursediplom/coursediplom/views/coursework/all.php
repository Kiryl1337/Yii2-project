<?php
/**
 * Created by PhpStorm.
 * User: Kiryl
 * Date: 01.12.2019
 * Time: 16:47
 */
/* @var $dataProvider \yii\data\ActiveDataProvider*/
$coursework=$dataProvider->getModels();
?>
<div class="body-content">

    <?= \yii\widgets\ListView::widget([
            'dataProvider'=>$dataProvider,
            'itemView'=>'_one',
    ]); ?>

</div>