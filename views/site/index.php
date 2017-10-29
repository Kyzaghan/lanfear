<?php

/* @var $this yii\web\View */
use app\components\Helper;
use yii\helpers\Url;
$this->title = \Yii::$app->params['serverName'];
$this->registerJsFile('https://code.highcharts.com/highcharts.js');
$this->registerJsFile('https://code.highcharts.com/highcharts-more.js');
$this->registerJsFile('https://code.highcharts.com/modules/solid-gauge.js');


$this->registerJs('LoadAsyncPartials();');

?>


<div class="site-index">
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Oyuna Son Giriş Yapanlar", Url::to(['stat/last_logged_in_uo_users']), \Yii::$app->params['loadingImage']) ?>
        </div>
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Siteye Son Giriş Yapanlar", Url::to(['stat/last_logged_in_users']), \Yii::$app->params['loadingImage']) ?>
        </div>
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Son Kayıt Olanlar", Url::to(['stat/last_registered_users']), \Yii::$app->params['loadingImage']) ?>
        </div>
    </div>
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Sunucu Kapasitesi", Url::to(['stat/server_capacity']), \Yii::$app->params['loadingImage']) ?>
        </div>
    </div>
</div>

