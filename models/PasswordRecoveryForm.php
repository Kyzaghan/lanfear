<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * [PasswordRecoveryForm Şifre unutulması ile ilgili yardımcı sınıf]
 */
class PasswordRecoveryForm extends Model
{
    public $username;
    public $verifyCode;


    /**
     * [rules Gelen verilen ile ilgili kurallar]
     * @return [array] [Dize olarak kuralları döner]
     */
    public function rules()
    {
        return [
            //Kullanıcı adı ve şifre gerekli
            [['username','verifyCode'], 'required'],
            //Doğrulama kodu girilmeli
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * [login Giriş yapma işlemi]
     * @return [boolean] [Başarılı ise true, başarısız ise false döner]
     */
    public function recovery()
    {
        if ($this->validate()) {
            $user = Users::findOne(['username' => $this->username]);
            if($user === null) {
                $this->addError('username', 'Kullanıcı adı bulunamadı');
                return false;
            } else {
                $user->auth_key = $user->generateAuthKey();
                $user->save();
                //Sistem e-posta onaylı çalışıyor ise
                if(\Yii::$app->params['confirmEmail'])
                {
                    \Yii::$app->mailer->compose()
                        ->setTo($user->email)
                        ->setFrom([\Yii::$app->params['adminEmail'] => \Yii::$app->params['serverName']])
                        ->setSubject('Şifre Kurtarma')
                        ->setHtmlBody("Yeni şifre almak için ".\yii\helpers\Html::a('buraya tıkla',
                                Yii::$app->urlManager->createAbsoluteUrl(
                                    ['user/send_new_password','id'=>$user->id,'key'=>$user->auth_key]
                                ))
                        )
                        ->send();
                }
            }
            return true;
        }
        return false;
    }


    /**
     * [attributeLabels Veritabanı alanlarının ekranda gösterimi için tanımlamalar]
     * @return [array] [Dize şeklinde döner]
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Kullanıcı Adı',
            'verifyCode' => 'Doğrulama Kodu'
        ];
    }
}
