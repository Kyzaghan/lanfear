<?php
/* @var $this yii\web\View */
use app\models\Users;

$data = Users::find()->select(['username', 'register_date'])->from('users')->Where(['not', ['register_date' => null]])->limit(5)->orderBy('register_date DESC')->asArray()->all();
$count = 1;
?>
<ul class="list-group" style="margin-bottom:0px; !important;">
<?php foreach ($data as $member): ?>
<li class="list-group-item" style="margin-left:0px !important;">(<?php echo $count; ?>) <?php echo $member['username'] ?> <span class="badge"><?php echo $member['register_date'] ?></span></li>

<?php $count++; endforeach; ?>
</ul>