<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\components\languageSwitcher;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

use kartik\icons\Icon;
Icon::map($this);

AppAsset::register($this);
$username =  !Yii::$app->user->isGuest ? Yii::$app->user->identity->username : "";

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => \Yii::$app->params['serverName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => Icon::show('home') .'Anasayfa', 'url' => ['/site/home']],
            ['label' => Icon::show('map') .'Harita', 'url' => ['/map/home']],
            ['label' => Icon::show('pie-chart') .'İstatistikler',
                'items' => [
                ['label' => Icon::show('users') .'Karakter Listesi', 'url' => ['/stat/characters']],
            ]],
            [
                'label' => Icon::show('user-plus') .'Kayıt Ol',
                'url' => ['user/register'],
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => Icon::show('sign-in') .'Giriş Yap',
                'url' => ['user/login'],
                'visible' => Yii::$app->user->isGuest
            ],

            [
                'label' => Icon::show('user') . $username,
                'visible' => !Yii::$app->user->isGuest,
                'items' => [
                    ['label' => Icon::show('user') .'Profilim', 'url' => ['/user/home']],
                    ['label' => Icon::show('sign-out') .'Çıkış Yap', 'url' => ['/user/logout']],
                ]
            ],
            languageSwitcher::Widget()
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><?php echo Html::a( "&copy; " .\Yii::$app->params['serverName'] ." ".  date('Y'), Yii::$app->urlManager->createAbsoluteUrl(['site/about'])) ?> by İsmail KÖSE</p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
