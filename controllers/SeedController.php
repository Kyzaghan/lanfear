<?php

namespace app\controllers;

use app\models\database\Users;
use app\models\database\Server;
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
    public function actionHome()
    {
        $oldApp = \Yii::$app;
        new \yii\console\Application([
            'id'            => 'Command runner',
            'basePath'      => '@app',
            'components'    => [
                'db' => $oldApp->db,
            ],
        ]);
        \Yii::$app->runAction('migrate', ['migrationPath' => '@app/migrations/', 'interactive' => false]);
        \Yii::$app = $oldApp;


        //Varsayılan Kullanıcı
        $user = new Users();
        $user->setIsNewRecord(true);
        $user->username = "kyzaghan";
        $user->password = sha1("123456");
        $user->email = "kyzaghan@ismailkose.com.tr";
        $user->is_active = 0;
        $user->register_date = date("Y-m-d H:i:s");
        $user->save();

        $server = Server::findOne(1);
        if($server === null)
        {
            //Varsayılan Sunucu
            $server = new Server();
            $server->id = 1;
            $server->capacity = 100;
            $server->currentOnline = 0;
            $server->save(false);
        }
        return null;
    }
}
