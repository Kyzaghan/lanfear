<?php

/* @var $this yii\web\View */
use app\components\Helper;
$this->title = \Yii::$app->params['serverName'];
?>
<div class="site-index">
  <div class="row">
    <?php echo Helper::WriteAsyncLoadCard("Sunucu Özet Bilgiler", "test", \Yii::$app->params['loadingImage']) ?>
    <?php echo Helper::WriteAsyncLoadCard("Sunucu Kapasitesi", "test", \Yii::$app->params['loadingImage']) ?>
    <?php echo Helper::WriteAsyncLoadCard("Haftalık Çevrimiçi İstatistiği", "test", \Yii::$app->params['loadingImage']) ?>
  </div>
</div>
