<?php

namespace app\components;

class Helper
{
    public static function WriteAsyncLoadCard($title, $url, $image)
    {
        return <<<EOT
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">$title</h3>
    </div>
    <div class="partialCallBack bootcards-chart-canvas" data-url="$url">
    <img class="loadingImage" src="$image" />
    </div>
    </div>
EOT;
    }

    public static function SendSMS($gsm, $header, $content)
    {

        $username = \Yii::$app->params['smsNetGsmUsername'];
        $password = \Yii::$app->params['smsNetGsmPassword'];
        $header = \Yii::$app->params['serverName'];

        $start_date = date('d.m.Y H:i');
        $start_date = str_replace('.', '', $start_date);
        $start_date = str_replace(':', '', $start_date);
        $start_date = str_replace(' ', '', $start_date);

        $stop_date = date('d.m.Y H:i', strtotime('+1 day'));
        $stop_date = str_replace('.', '', $stop_date);
        $stop_date = str_replace(':', '', $stop_date);
        $stop_date = str_replace(' ', '', $stop_date);

        $url = "http://api.netgsm.com.tr/bulkhttppost.asp?usercode=$username&password=$password&gsmno=$gsm&message=$content&msgheader=$header&startdate=$start_date&stopdate=$stop_date";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
