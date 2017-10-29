<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
* This is the model class for table "users".
*
* @property integer $id
* @property string $username
* @property string $password
* @property string $email
* @property integer $is_active
* @property string $register_date
* @property string $last_login
* @property integer $tcno
* @property integer $uo_active
* @property string uo_password
*/
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
  /**
  * @inheritdoc
  */
  public static function tableName()
  {
    return 'users';
  }

  /**
  * @inheritdoc
  */
  public function rules()
  {
    return [
      [['username', 'password', 'email', 'is_active'], 'required'],
      [['is_active', 'tcno'], 'integer'],
      [['register_date', 'last_login'], 'safe'],
      [['username', 'password', 'email'], 'string', 'max' => 255],
      [['username'], 'unique'],
    ];
  }

  /**
  * @inheritdoc
  */
  public function attributeLabels()
  {
    return [
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


  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  /**
  * Finds user by username
  *
  * @param string $username
  * @return static|null
  */
  public static function findByUsername($username)
  {
    return static::findOne(['username' => $username]);
  }

  /**
  * @inheritdoc
  */
  public function getAuthKey()
  {
    return $this->auth_key;
  }

  /**
  * @inheritdoc
  */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    return static::findOne(['access_token' => $token]);
  }

  /**
  * @inheritdoc
  */
  public function getId()
  {
    return $this->getPrimaryKey();
  }

  /**
  * @inheritdoc
  */
  public function validateAuthKey($authKey)
  {
    return $this->getAuthKey() === $authKey;
  }
/**
 * [generateAuthKey E-posta onaylama için rastgele sayı oluşturuluyor]
 * @return [integer] [Rastgele sayı]
 */
  public function generateAuthKey()
  {
    return rand(10000, 99999);
  }

  /**
  * Validates password
  *
  * @param string $password password to validate
  * @return bool if password provided is valid for current user
  */
  public function validatePassword($password)
  {
    return $this->password === sha1($password);
  }
}
