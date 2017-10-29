<?php

namespace app\components;

class Helper
{
  public static function WriteAsyncLoadCard($title, $url, $image) {
   return  <<<EOT
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
}
