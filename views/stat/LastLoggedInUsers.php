<?php
/* @var $this yii\web\View */
use app\models\database\Users;

$data = Users::find()->select(['username', 'last_login'])->from('users')->Where(['not', ['last_login' => null]])->limit(5)->orderBy('last_login DESC')->asArray()->all();
$count = 1;
?>
<ul class="list-group" style="margin-bottom:0px; !important;">
<?php foreach ($data as $member): ?>
<li class="list-group-item" style="margin-left:0px !important;">(<?php echo $count; ?>) <a href = "<?php echo Users::getUserLink($member['username']); ?>"><?php echo $member['username']; ?></a> <span class="badge"><?php echo $member['last_login'] ?></span></li>

<?php $count++; endforeach; ?>
</ul>