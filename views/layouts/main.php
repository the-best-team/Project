<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Tracker',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Цели', 'url' => ['/targets']],
        ['label' => 'Новая задача', 'url' => ['/tasks/create']],
        ['label' => 'Задачи на день', 'url' => ['/tasks/day']],
        ['label' => 'Все задачи', 'url' => ['/tasks']],
//        ['label' => 'Списки', 'url' => ['#']],

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = '<div class="full-menu">'
            . '<li><i class="fa fa-sign-in sign-in" aria-hidden="true"></i>'
            . '<ul class="my-drop-menu"><div>'
            . '<li><a href="signup">Зарегистрироваться</a></li>'
            . '<li><a href="login">Войти</a></li>'
            . '</div>'
            . '</ul>'
            . '</li></div>'

            . '<div class="mobile-menu">'
            . '<li><a href="signup">Зарегистрироваться</a></li>'
            . '<li><a href="login">Войти</a></li>'
            . '</div>';
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right desk-menu'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
<!--        Пока хлебные крошки не нужны-->
<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container foot-wrap">

        <div class="foot-div-logo">
            <a href="/"><img src="/../img/logo.png" alt="logo" class="logo"></a>
            <span>My Tracker</span><br>
            <p>Objectively transition extensive data rather than cross functional
                solutions. Monotonectally syndicate multidisciplinary materials
                before go forward benefits. Intrinsicly syndicate an expanded
                array of processes and cross-unit partnerships. Efficiently
                plagiarize 24/365 action items and focused infomediaries.
                Distinctively seize superior initiatives for wireless technologies.
                Dynamically optimize.</p>
        </div>
        <div class="foot-div-menu">
            <span>Меню</span><br>
            <p>
                <a href="#">Новая задача</a><br>
                <a href="#">Цели</a><br>
                <a href="#">Задачи на день</a><br>
                <a href="#">Списки</a><br>
                <a href="#">Отчеты</a>
            </p>
        </div>
        <div class="foot-div-info">
            <span>Information</span><br>
            <p>
                <a href="#">Tearms & Condition</a><br>
                <a href="#">Privacy Policy</a><br>
                <a href="#">How to Buy</a><br>
                <a href="#">How to Sell</a><br>
                <a href="#">Promotion</a>
            </p>
        </div>

    </div>

    <div class="foot-bottom">
        <div class="container">
            <p class="pull-left">&copy; My Tracker 2019</p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
