<?php

namespace app\controllers;

use yii\web\Controller;
class StatController extends Controller
{
    /**
     * Son giriş yapan 5 kullanıcı
     * @return View
     */
    public function actionLast_logged_in_users()
    {
        return $this->renderPartial('LastLoggedInUsers');
    }

    /**
     * Oyuna giriş yapan son 5 kullanıcı
     * @return View
     */
    public function actionLast_logged_in_uo_users()
    {
        return $this->renderPartial('LastLoggedInUoUsers');
    }

    /**
     * Sunucu kapasite durumu
     * @return View
     */
    public function actionServer_capacity()
    {
        return $this->renderPartial('ServerCapacity');
    }

    /**
     * Son kayıt olan kullanıcılar
     * @return View
     */
    public function actionLast_registered_users()
    {
        return $this->renderPartial('LastRegisteredUsers');
    }
}
