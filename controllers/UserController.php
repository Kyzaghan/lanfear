<?php
namespace app\controllers;

use app\models\PasswordRecoveryForm;
use app\models\RegisterForm;
use app\models\LoginForm;
use app\models\database\Users;

use app\models\SmsConfirmForm;
use app\models\UsersLogin;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\components\Helper;

/**
 * [UserController Kullanıcı işlemlerinin yapıldığı controller sınıfı]
 */
class UserController extends Controller
{

    /**
     * [behaviors Kullanıcı yetkilendirme işlemleri]
     * @return [null] [Geri dönüş değeri yok.]
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'home'],
                'rules' => [
                    [
                        'actions' => ['logout', 'home'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**index
     * [actionLogin Giriş işlemi]
     * @return [view] [Başarılı ise geri, başarısız ise giriş sayfasına ve zaten oturum açmışsa anasayfaya yönlendirir.]
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $users_login = new UsersLogin();
            $users_login->user_id = Yii::$app->user->id;
            $users_login->login_time = date("Y-m-d H:i:s");
            $users_login->ip = Yii::$app->request->getUserIP();
            $users_login->user_agent = Yii::$app->request->getUserAgent();
            $users_login->save();
            return $this->redirect(['user/home']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * [actionLogout Çıkış işlemi]
     * @return [view] [Anasayfaya yönlendirir]
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * [actionIndex Kullanıcı anasayfası]
     * @return [view] [Anasayfa view dosyasını render eder]
     */
    public function actionHome()
    {
        return $this->render('index');
    }

    /**
     * [actionRegister Kayıt İşlemi]
     * @return [view] [Eğer başarılı ise giriş sayfasına, başarısız ise kayıt sayfasına yönlendirir.]
     */
    public function actionRegister()
    {
        $model = new RegisterForm();
        if (!Yii::$app->request->post()){
            return $this->render('register', [
                'model' => $model,
            ]);
        }
        $postVariables = Yii::$app->request->post();
        $model->load($postVariables);

        //Kullanıcı sınıfı ve posttan gelen değerlerin bu sınıfa aktarılması
        $userModel = new Users();
        $userModel->is_active = 0;
        $userModel->username = $model->username;
        $userModel->email = $model->email;
        $userModel->tcno = $model->tcno;
        $userModel->password = sha1($model->password);
        $userModel->uo_active = 0;
        $userModel->uo_password = $model->password;
        $userModel->register_date = date("Y-m-d H:i:s");
        $userModel->registered_ip = Yii::$app->getRequest()->getUserIP();
        $userModel->gsm = $model->gsm;
        $isError = false;

        //Kullanıcı adının daha önce alınıp alınmadığı kontrol ediliyor
        if(Users::find()->where(['username'=> $model->username])->one())
        {
            $model->addError('username', 'Kullanıcı adı daha önce alınmış.');
            $isError = true;
        }

        //E-postanın daha önce alınıp alınmadığı kontrol ediliyor
        if(Users::find()->where(['email'=> $model->email])->one())
        {
            $model->addError('email', 'E-Posta daha önce alınmış.');
            $isError = true;
        }

        //E-Posta sunucu kontrolü
        if(\Yii::$app->params['checkEmailDomains'])
        {
            $validDomains = explode(',', \Yii::$app->params['validEmailDomains']);
            list($user, $domain) = explode('@', $model->email);

            if (!in_array($domain, $validDomains)) {
                $model->addError('email', 'E-Posta domain adresi, izin verilen domainler arasında değil.');
                $isError = true;
            }
        }

        //Gsm Kontrolü
        if(\Yii::$app->params['confirmSms'])
        {
            if(strlen($userModel->gsm) < 12)
            {
                $model->addError('gsm', 'Sunucu da SMS onayı aktif edilmiş, bu yüzden telefon numaranızı girmelisiniz.');
                $isError = true;
            }
        }

        //Ip sınır kontrolü
        if(\Yii::$app->params['IpRegisterLimit'])
        {
            $registeredCount = Users::find()->where(['registered_ip'=> $userModel->registered_ip])->count();

            if($registeredCount >= \Yii::$app->params['IpRegisterLimitCount'])
            {
                $model->addError('username',
                    'Aynı ip üzerinden maksimum '. \Yii::$app->params['IpRegisterLimitCount']. ' kere kayıt olunabilir.');
                $isError = true;
            }
        }

        //Eğer hata varsa model geri dönülüyor
        if($isError) {
            return $this->render('register', [
                'model' => $model,
            ]);
        }

        //E-posta onaylama parametresi aktif edildi ise auth_key oluşturuluyor
        if(\Yii::$app->params['confirmEmail'] || \Yii::$app->params['confirmSms'] )
        {
            $userModel->auth_key = $userModel->generateAuthKey();
            $userModel->is_active = 0;
        }

        //Kaydetme işlemi yapılıyor, eğer başarısızsa kayıt sayfasına geri dönecek başarılı ise giriş sayfasına gidecek.
        if ($model->validate() && $userModel->validate() && $userModel->save()) {



            if(\Yii::$app->params['confirmSms'])
            {
                Helper::SendSMS('90'. str_replace($userModel->gsm, '-', ''), '', 'Hesabinizi onaylamak icin kodunuz: ' . $userModel->auth_key);
                return $this->redirect(Url::to(['sms_confirm', 'username' => $userModel->username]));
            } else if(\Yii::$app->params['confirmEmail']) //E-posta onaylama parametresi aktif edildi ise e-posta gönderiliyor
                {
                    \Yii::$app->mailer->compose()
                        ->setTo($userModel->email)
                        ->setFrom([\Yii::$app->params['adminEmail'] => \Yii::$app->params['serverName']])
                        ->setSubject('Kayıt Onaylama')
                        ->setHtmlBody("
                                     Onaylamak için ".\yii\helpers\Html::a('buraya tıkla',
                                        Yii::$app->urlManager->createAbsoluteUrl(['user/confirm','id'=>$userModel->id,'key'=>$userModel->auth_key]
                                ))
                        )
                        ->send();
                }
            return $this->redirect(['login']);
        }


        return $this->render('register', [
            'model' => $model,
        ]);
    }
    /**
     * [actionConfirm Kullanıcı onaylama]
     * @param  [type] $id  [kullanıcı kimliği]
     * @param  [type] $key [onay kodu]
     * @return [redirect]  [Anasayfa]
     */
    public function actionConfirm($id, $key)
    {
        $user = Users::find()->where([
            'id'=>$id,
            'auth_key'=>$key,
            'is_active'=> 0,
        ])->one();

        if(!empty($user)){
            $user->is_active=1;
            $user->auth_key = null;
            $user->save();
            Yii::$app->getSession()->setFlash('success','Success!');
        }
        else{
            Yii::$app->getSession()->setFlash('warning','Failed!');
        }
        return $this->goHome();
    }


    /**
     * @return string|\yii\web\Response
     */
    public function actionPassword_recovery()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new PasswordRecoveryForm();
        if ($model->load(Yii::$app->request->post()) && $model->recovery()) {

            return $this->redirect(['site/home']);
        }

        return $this->render('recovery', [
            'model' => $model,
        ]);
    }

    /**
     * Şifre kurtarmada yeni şifreyi kullanıcıya gönderir
     * @param $id
     * @param $key
     */
    public function actionSend_new_password($id, $key)
    {
        $user = Users::find()->where([
            'id'=>$id,
            'auth_key'=>$key
        ])->one();

        $data = array();
        if(!empty($user)){
            $password = rand(10000, 99999);
            $user->is_active=1;
            $user->auth_key = null;
            $user->password = sha1($password);
            $user->uo_password = $password;
            $user->uo_active = 0;
            $user->save();

            //Sistem e-posta onaylı çalışıyor ise
            if(\Yii::$app->params['confirmEmail'])
            {
                \Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    ->setFrom([\Yii::$app->params['adminEmail'] => \Yii::$app->params['serverName']])
                    ->setSubject('Yeni şifreniz')
                    ->setHtmlBody("Yeni şifreniz: " . $password)
                    ->send();
            }

            $data['message'] = "Şifreniz sıfırlanıp e-posta adresinize gönderildi.";
            $data['status'] = "success";
        }
        else{
            $data['message'] = "Kullanıcı bulunamadı veya aktivasyon kodu geçersiz.";
            $data['status'] = "danger";
        }
        return $this->render('send_new_password', [
            'model' => $data,
        ]);
    }

    /**
     * Şifre kurtarmada yeni şifreyi kullanıcıya gönderir
     * @param $id
     * @param $key
     */
    public function actionSms_confirm()
    {
        //Model yaratılıyor
        $model = new SmsConfirmForm();

        //Eğer istek post değilse, get işlemi için view dönülüyor
        if (Yii::$app->request->getIsGet()){
            $model->username = Yii::$app->request->get('username');
            return $this->render('sms_confirm', [
                'model' => $model,
            ]);
        }

        //Eğer istek post ise gelen veriler modele yükleniyor
        $postVariables = Yii::$app->request->post();
        $model->load($postVariables);

        //Kullanıcı ve onay kodu bulunuyor
        $user = Users::find()->where([
            'username'=>$model->username,
            'auth_key'=>$model->auth_key
        ])->one();

        //Kullanıcı bulundu ise onay işlemi yapılıyor
        if(!empty($user) && $model->validate()){
            $user->is_active = 1;
            $user->auth_key = null;
            $user->save();
            Yii::$app->getSession()->setFlash('success','Hesabınız onaylandı!');
        } else { //Kullanıcı bulunamadı hata dönülüyor.
            $model->addError('auth_key',
                'Kullanıcı veya onay kodu bulunamadı');
        }

        return $this->render('sms_confirm', [
            'model' => $model,
        ]);
    }

}