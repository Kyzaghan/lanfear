<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
* [RegisterForm Kayıt olma sınıfı]
*/
class RegisterForm extends Model
{
  public $username;
  public $email;
  public $password;
  public $verifyCode;
  public $tcno;


  /**
  * [rules Kurallar, girilen verilerin belirli bir kural dahilinde girilmesini sağlar]
  * @return [array] [Dize şeklinde kuralları döner]
  */
  public function rules()
  {
    return [
      //kullanıcı adı, e-posta, şifre girilmeli
      [['username', 'email', 'password', 'verifyCode'], 'required'],
      //E-posta geçerli bir e-posta olmalı
      ['email', 'email'],
      //Doğrulama kodu girilmeli
      ['verifyCode', 'captcha'],
      //Tc no boşluk olmamalı
      ['tcno', 'trim'],
      //Tc no girilmemiş ise null insert edilmeli
      ['tcno', 'default', 'value' => null],
      //Tc no integer olmalı
      [['tcno'], 'integer'],
      //Tc no string olarak uzunluk kontrolü yapılmalı
      ['tcno', 'string',  'min' => 11, 'max' => 11],
      //Kullanıcı adı sadece harfler ve sayılardan oluşmalı.
      ['username', 'match', 'pattern' => '/^[a-zA-Z1-9\s]+$/', 'message' => 'Kullanıcı adı sadece harfler ve sayılardan oluşabilir.']
    ];
  }

  /**
  * [attributeLabels Veritabanı alanlarının ekranda gösterimi için tanımlamalar]
  * @return [array] [Dize şeklinde döner]
  */
  public function attributeLabels()
  {
    return [
      'verifyCode' => 'Doğrulama Kodu',
      'id' => 'ID',
      'username' => 'Kullanıcı Adı',
      'password' => 'Şifre',
      'email' => 'E-posta',
      'is_active' => 'Aktif mi?',
      'register_date' => 'Kayıt Tarihi',
      'last_login' => 'Son Giriş',
      'tcno' => 'T.C. Kimlik Numarası',
    ];
  }

}
