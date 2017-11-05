<?php
/*
author :: Pitt Phunsanit
website :: http://plusmagi.com
change language by get language=EN, language=TH,...
or select on this widget
*/

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\bootstrap\ButtonDropdown;
use yii\helpers\Url;

class languageSwitcher extends Widget
{
    /* ใส่ภาษาของคุณที่นี่ */
    public $languages = [
        'en' => 'English',
        'tr' => 'Türkçe',
    ];

    public function init()
    {
        if(php_sapi_name() === 'cli')
        {
            return true;
        }

        parent::init();

        $cookies = Yii::$app->response->cookies;
        $languageNew = Yii::$app->request->get('language');
        if($languageNew)
        {
            if(isset($this->languages[$languageNew]))
            {
                Yii::$app->language = $languageNew;
                $cookies->add(new \yii\web\Cookie([
                    'name' => 'language',
                    'value' => $languageNew
                ]));
            }
        }
        elseif($cookies->has('language'))
        {
            Yii::$app->language = $cookies->getValue('language');
        }

    }

    public function run(){
        $languages = $this->languages;
        $current = $languages[Yii::$app->language];
        unset($languages[Yii::$app->language]);

        $items = [];
        foreach($languages as $code => $language)
        {
            $temp = [];
            $temp['label'] = $language;
            $temp['url'] = Url::current(['language' => $code]);
            array_push($items, $temp);
        }

         echo ButtonDropdown::widget([
            'label' => $current,
            'dropdown' => [
                'items' => $items
            ],
             'containerOptions' => [
                 'style' =>'color:white;height:50px; width:126px; padding-top:8px;'
             ]
        ]);
    }

}