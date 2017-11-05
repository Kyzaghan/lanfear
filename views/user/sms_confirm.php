<?php
/**
 * Created by PhpStorm.
 * User: kyzaghan
 * Date: 05.11.2017
 * Time: 17:18
 */

use kartik\widgets\AlertBlock;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Sms Onayı';
$this->params['breadcrumbs'][] = $this->title;

?>

<div>

  <?php
  echo AlertBlock::widget([
        'type' => AlertBlock::TYPE_GROWL,
        'useSessionFlash' => true,
        'delay' => 0
    ]);
  ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= $form->field($model, 'username')->textInput() ?>
    </div>

    <div class="form-group">
        <?= $form->field($model, 'auth_key')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '99999',
        ]) ?>
    </div>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Hesabımı Onayla', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- register -->

