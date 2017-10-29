<?php
/* @var $this yii\web\View */
use app\models\UsersLogin;
$data = UsersLogin::find()->Where(['user_id' => Yii::$app->getUser()->id])->limit(5)->orderBy('id DESC')->asArray()->all();

?>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title pull-left">Son girişlerim</h3>
            </div>
            <div class="bootcards-chart-canvas">
                <?php foreach ($data as $member): ?>
                <ul class="list-group">
                    <li class="list-group-item" style="margin-left:0px !important; padding-bottom:25px; ">(<?php echo $member['ip']; ?>) <?php echo $member['user_agent'] ?> <span class="badge"><?php echo $member['login_time'] ?></span></li>
                </ul>
                 <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>