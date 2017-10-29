<?php

/* @var $this yii\web\View */
use app\components\Helper;
use yii\helpers\Url;
$this->title = \Yii::$app->params['serverName'];
?>
<div class="site-index">
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Sunucu Özet Bilgiler", "test", \Yii::$app->params['loadingImage']) ?>
        </div>
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Sunucu Kapasitesi", "test", \Yii::$app->params['loadingImage']) ?>
        </div>
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Son giriş yapanlar", Url::to(['stat/last_logged_in_users']), \Yii::$app->params['loadingImage']) ?>
        </div>
    </div>
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-lg-4">
            <?php echo Helper::WriteAsyncLoadCard("Haftalık Çevrimiçi İstatistiği", "test", \Yii::$app->params['loadingImage']) ?>
        </div>
    </div>
</div>


<script type="text/javascript">
    setTimeout(function () { LoadAsyncPartials(); }, 80);
</script>