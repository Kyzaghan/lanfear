<?php

namespace app\models;

use yii\base\Model;

/**
 * Class SmsConfirmForm
 * @package app\models
 */
class SmsConfirmForm extends Model
{
  public $username;
  public $auth_key;
  public $verifyCode;

  /**
  * [rules Gelen verilen ile ilgili kurallar]
  * @return [array] [Dize olarak kuralları döner]
  */
  public function rules()
  {
    return [
        [['username', 'auth_key', 'verifyCode'], 'required'],
        ['auth_key', 'integer'],
        ['verifyCode', 'captcha'],
    ];
  }

  /**
  * [attributeLabels Veritabanı alanlarının ekranda gösterimi için tanımlamalar]
  * @return [array] [Dize şeklinde döner]
  */
  public function attributeLabels()
  {
    return [
        'username' => 'Kullanıcı Adı',
        'verifyCode' => 'Doğrulama Kodu',
        'auth_key' => 'Onay Kodu'
    ];
  }
}
