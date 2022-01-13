<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Coursediplom</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    if (Yii::$app->user->isGuest || Yii::$app->user->identity->role=='student') {
        NavBar::begin([
            'brandLabel' => 'Главная',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],

        ]);
    } else if(Yii::$app->user->identity->role=='admin' || Yii::$app->user->identity->role=='teacher')
        NavBar::begin([
            'brandLabel' => 'Панель управления',
            'brandUrl' => ["/admin"],
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],

        ]);




        if (!Yii::$app->user->isGuest) {
            $menuItems = [
                [
                    'label'=>'Просмотр <span class="glyphicon glyphicon-eye-open">',
                    'items'=>[
                        [
                            'label' => 'Курсовые', 'url' => ['/coursework/index'],
                        ],
                        '<li class="divider"></li>',
                        [
                            'label' => 'Диломные', 'url' => ['/diplom/index'],
                        ]
                    ]

                ],
                [
                    'label'=>'Запись  <span class="glyphicon glyphicon-pencil">',
                    'items'=>[
                        [
                            'label' => 'На курсовую', 'url' => ['/coursework_record/index'],
                        ],
                        '<li class="divider"></li>',
                        [
                            'label' => 'На дипплом', 'url' => ['/diplom_record/index'],
                        ]
                    ],'visible'=>Yii::$app->user->identity->role=='student'

                ],

            ];
        }
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
        } else {
            $menuItems[] =  ['label' => Yii::$app->user->identity->username . ' ' . '<span class="glyphicon glyphicon-user">', 'items' => [
                    ['label' => 'Профиль', 'url' => ['/user/profile/index'],],
                    '<li class="divider"></li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',  ['class' => 'btn btn-default']
                    )
                    . Html::endForm()
                    . '</li>'
                ]];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
			'encodeLabels'=>false,
        ]);
        NavBar::end();
        ?>



    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
