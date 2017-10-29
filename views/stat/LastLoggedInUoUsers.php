<?php
/* @var $this yii\web\View */
use app\models\Users;

$data = Users::find()->select(['username', 'uo_last_login'])->from('users')->Where(['not', ['uo_last_login' => null]])->limit(5)->orderBy('uo_last_login DESC')->asArray()->all();
$count = 1;
?>
<ul class="list-group" style="margin-bottom:0px; !important;">
<?php foreach ($data as $member): ?>
<li class="list-group-item" style="margin-left:0px !important;">(<?php echo $count; ?>) <?php echo $member['username'] ?> <span class="badge"><?php echo $member['uo_last_login'] ?></span></li>

<?php $count++; endforeach; ?>
</ul>