<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
* [LoginForm Giriş işlemlerinin kontrol edildiği sınıf]
*/
class LoginForm extends Model
{
  public $username;
  public $password;
  public $rememberMe = true;

  private $_user = false;


  /**
  * [rules Gelen verilen ile ilgili kurallar]
  * @return [array] [Dize olarak kuralları döner]
  */
  public function rules()
  {
    return [
      //Kullanıcı adı ve şifre gerekli
      [['username', 'password'], 'required'],
      //Beni Hatırla boolean veri tipinde olmalı
      ['rememberMe', 'boolean'],
      //Şifre validatePassword fonksiyonu ile doğrulanmalı
      ['password', 'validatePassword'],
    ];
  }

  /**
  * [validatePassword Şifre kontrolü]
  * @param  [string] $attribute [Form bileşeni]
  * @param  [array] $params    [Parametreler]
  * @return [null]            [null]
  */
  public function validatePassword($attribute, $params)
  {
    if (!$this->hasErrors()) {
      $user = $this->getUser();

      if (!$user || !$user->validatePassword($this->password)) {
        $this->addError($attribute, 'Kullanıcı adı veya şifre hatalı.');
      }
    }
    return null;
  }

  /**
  * [login Giriş yapma işlemi]
  * @return [boolean] [Başarılı ise true, başarısız ise false döner]
  */
  public function login()
  {
    if ($this->validate()) {
        $this->getUser()->last_login = date('Y-m-d H:i:s');
        $this->getUser()->save();
      return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
    }
    return false;
  }

  /**
  * [getUser Kullanıcıyı geri döner]
  * @return [Users] [Kullanıcı bilgileri]
  */
  public function getUser()
  {
    if ($this->_user === false) {
      $this->_user = Users::findByUsername($this->username);
    }

    return $this->_user;
  }

  /**
  * [attributeLabels Veritabanı alanlarının ekranda gösterimi için tanımlamalar]
  * @return [array] [Dize şeklinde döner]
  */
  public function attributeLabels()
  {
    return [
      'username' => 'Kullanıcı Adı',
      'password' => 'Şifre',
      'rememberMe' => 'Beni Hatırla'
    ];
  }
}
