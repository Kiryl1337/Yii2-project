<div class="admin-default-index">
    <?php if(Yii::$app->user->identity->role=='admin'): ?>
        <h1>Здравствуйте,<?php echo " ".Yii::$app->user->identity->FIO ?></h1>
<?php endif?>

    <?php if(Yii::$app->user->identity->role=='teacher'): ?>
        <h1>Здравствуйте,  <?php  echo " ".Yii::$app->user->identity->FIO ?></h1>
    <?php endif?>

</div>
