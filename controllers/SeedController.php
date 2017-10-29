<?php

namespace app\controllers;

use app\models\Users;
use yii\web\Controller;

/**
* [SeedController Veritabanına varsayılan değerleri yazması için kullanılır.]
*/
class SeedController extends Controller
{
  /**
  * [actionIndex İşlemler]
  * @return [null] [null]
  */
  public function actionIndex()
  {
    $faker = \Faker\Factory::create();
    $user = new Users();
    $user->setIsNewRecord(true);
    $user->username = "kyzaghan";
    $user->password = sha1("123456");
    $user->email = "kyzaghan@ismailkose.com.tr";
    $user->is_active = 0;
    $user->save();
  }
}
