<?php
namespace app\controllers;

use app\models\RegisterForm;
use app\models\LoginForm;
use app\models\Users;

use app\models\UsersLogin;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Request;
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
        'only' => ['logout', 'index'],
        'rules' => [
          [
            'actions' => ['logout', 'index'],
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
      'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
          'logout' => ['post'],
        ],
      ],
    ];
  }

  /**
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
      return $this->redirect(['user/index']);
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
  public function actionIndex()
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
    $userModel->register_date = date("Y-m-d H:i:s");

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

    //Eğer hata varsa model geri dönülüyor
    if($isError) {
      return $this->render('register', [
        'model' => $model,
      ]);
    }

    //E-posta onaylama parametresi aktif edildi ise auth_key oluşturuluyor
    if(\Yii::$app->params['confirmEmail'])
    {
      $userModel->auth_key = $userModel->generateAuthKey();
      $userModel->is_active = 0;
    }

    //Kaydetme işlemi yapılıyor, eğer başarısızsa kayıt sayfasına geri dönecek başarılı ise giriş sayfasına gidecek.
    if ($userModel->save()) {

      //E-posta onaylama parametresi aktif edildi ise e-posta gönderiliyor
      if(\Yii::$app->params['confirmEmail'])
      {
        \Yii::$app->mailer->compose()
        ->setTo($userModel->email)
        ->setFrom([\Yii::$app->params['adminEmail'] => \Yii::$app->params['serverName'] . ' robot'])
        ->setSubject('Kayıt Onaylama')
        ->setHtmlBody("
        Onaylamak için ".\yii\helpers\Html::a('buraya tıkla',
        Yii::$app->urlManager->createAbsoluteUrl(
          ['user/confirm','id'=>$userModel->id,'key'=>$userModel->auth_key]
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
    }
