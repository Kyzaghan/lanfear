<?php

namespace app\components;

class Helper
{
  public static function WriteAsyncLoadCard($title, $url, $image) {
   return  <<<EOT
    <div class=" col-xs-12 col-sm-6 col-lg-4">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left">$title</h3>
    </div>
    <div class="partialCallBack bootcards-chart-canvas" url="$url">
    <img class="loadingImage" src="$image" />
    </div>
    </div>
    </div>
EOT;
  }
}
