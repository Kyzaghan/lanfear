<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Class MapController
 * @package app\controllers
 */
class MapController extends Controller
{
    /**
     * [actionIndex İşlemler]
     * @return [null] [null]
     */
    public function actionHome()
    {
        return $this->renderPartial('map');
    }
}
