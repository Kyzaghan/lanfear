<?php

namespace app\controllers;

use app\models\database\UsersCharacters;
use app\models\search\UsersCharactersSearch;
use yii\web\Controller;
use Yii;
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

    /**
     * Karakter listesi
     * @return string
     */
    public function actionCharacters()
    {
        $searchModel = new UsersCharactersSearch();
        return $this->render('chars', [
            'model' => $searchModel->search(Yii::$app->request->queryParams),
            'searchModel' => $searchModel
        ]);
    }

    /**
     * Karakter Detayı
     * @return string
     */
    public function actionChar_detail($char)
    {
        $searchModel = UsersCharacters::find()->where(['=', 'serial', $char])->one();
        return $this->render('char_detail', [
            'model' => $searchModel,
        ]);
    }
}
