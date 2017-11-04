<?php

use kartik\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */

$this->title = 'Kayıt Ol';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="register">
<div>
    <?php
    echo Alert::widget([
        'type' => Alert::TYPE_DANGER,
        'title' => 'Önemli Uyarı',
        'body' => 'Lütfen başka sunucularda kullandığınız parolanızı, bu sunucuda kullanmayınız.'
    ]);
    ?>
</div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
      <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
    </div>
    <div class="form-group">
      <?= $form->field($model, 'username')->textInput() ?>
    </div>

    <div class="form-group">
      <?= $form->field($model, 'password')->textInput(['type' => 'password']) ?>
    </div>
    <div class="form-group">
        <?= $form->field($model, 'gsm')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '999-9999-999',
        ]) ?>
    </div>
    <div class="form-group">
      <?= $form->field($model, 'tcno')->textInput() ?>
    </div>
    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                      'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                  ]) ?>
        <div class="form-group">
            <?= Html::submitButton('Kayıt Ol', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- register -->
