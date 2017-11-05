<?php
/**
 * Created by PhpStorm.
 * User: kyzaghan
 * Date: 05.11.2017
 * Time: 14:50
 */

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Harita';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= Html::encode($this->title) ?></title>
    <script src="<?php echo Url::home(true); ?>js/map/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="<?php echo Url::home(true); ?>css/map/bootstrap.min.css">
    <script src="<?php echo Url::home(true); ?>js/map/bootstrap.min.js"></script>
    <link href="<?php echo Url::home(true); ?>css/map/ol.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Url::home(true); ?>css/map/ol3-layerswitcher.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?php echo Url::home(true); ?>js/map/ol.js"></script>
    <script type="text/javascript" src="<?php echo Url::home(true); ?>js/map/ol3-layerswitcher.js"></script>

    <style type="text/css">
        html {
            margin:0px;
            padding:0px;
            width:100%;
            height:100%;
        }
        body {
            line-height: 0px;
            margin:0px;
            padding:0px;
            background-color:white;
            width:100%;
            height:100%;
        }
        #content {
            position: relative;
            width: 100%;
            height:100%;
            background-color:black;
        }
        #sidebar {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 240px;
            background-color:black;
        }
        #sidebar h3 {
            color:white;
            margin-left:10px;
        }
        #main {
            position: relative;
            margin-left: 250px;
            height:100%;
            background-color:black;
        }
        #map {
            width:100%;
            height:100%;
            background-color:black;
        }
        #progress {
            position: absolute;
            bottom: 0;
            left: 0;
            color:white;
            height: 20px;
            background:black;
            width: 100%;
            text-align:center;
            transition: width 250ms;
        }
        .olControlLayerSwitcher
        {
            position: absolute;
            right: 10px !important;
            width: 20em !important;
            font-family: sans-serif;
            font-weight: bold;
            margin-top: 3px;
            margin-left: 3px;
            margin-bottom: 3px;
            font-size: smaller;
            color: #FFFFFF !important;
            background-color: black;
        }
        .olControlLayerSwitcher .layersDiv
        {
            padding-top: 5px;
            padding-left: 10px;
            padding-bottom: 5px;
            padding-right: 10px;
            background-color: #black !important;
            -webkit-border-radius: 5px !important;
            -moz-border-radius: 5px !important;
            -o-border-radius: 5px !important;
            -ms-border-radius: 5px !important;
            -khtml-border-radius: 5px !important;
            border-radius: 5px !important;
            -khtml-opacity: .8;
            -moz-opacity: .8;
            -ms-filter: ”alpha(opacity=8)”;
            filter: alpha(opacity=8);
            filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.8);
            opacity: .8;
        }
        .olControlLayerSwitcher .layersDiv .baseLbl
        {
            display: none;
        }
        .olControlLayerSwitcher .layersDiv .baseLayersDiv
        {
            display: none;
        }
        .popover {
            z-index: 1010;
            top:52px;
        }
    </style>
    <script type="text/javascript">
        var changeLayerStatus;
        $(document).ready(function() {
            var mapx = 5115;
            var mapy = 4085;
            w_offset = 0;
            h_offset = 0;
            var extent = [0, 0, mapx, mapy];
            var projection = new ol.proj.Projection({
                code: 'xkcd-image',
                units: 'pixels',
                extent: extent
            });

            var source = new ol.source.ImageStatic({

                url: '<?php echo Url::home(true); ?>/image/map/mapsos.png',
                projection: projection,
                imageExtent: extent
            });


            source.on('imageloadstart', function(event) {
                $("#progress").show();
            });
            source.on('imageloadend', function(event) {
                $("#progress").hide();
            });
            source.on('imageloaderror', function(event) {
                $("#progress").hide();
            });

            var map = new ol.Map({
                interactions: ol.interaction.defaults({mouseWheelZoom:true}),
                allOverlays: true,
                controls:[],
                layers: [
                    new ol.layer.Image({
                        source: source
                    })
                ],
                target: 'map',
                view: new ol.View({
                    projection: projection,
                    center: ol.extent.getCenter(extent),
                    zoom: 4,
                    minZoom:1,
                    maxZoom:6,
                    extent: [0, 0, mapx, mapy]
                }),
            });
            map.on('pointermove', function (e) {
                var coord = map.getCoordinateFromPixel(map.getEventPixel(e.originalEvent));
                var lon = coord[0];
                var lat = mapy-coord[1];
                if (lon < 0 || lat < 0) {
                    lon = 0;
                    lat = 0;

                }
                if (lon > (mapx - w_offset) || lat > (mapy - h_offset)) {

                    lon = mapx - w_offset;

                    lat = mapy - h_offset;

                }
                document.getElementById("coords").innerHTML = Math.floor(lon) + "," + Math.floor(lat);
            });
            function addOverlays(lon, lat, name, icon, wsize, ysize, type) {
                lat = mapy-lat;
                if (lon < 0 || lat < 0) {
                    lon = 0;
                    lat = 0;

                }
                if (lon > (mapx - w_offset) || lat > (mapy - h_offset)) {
                    lon = mapx - w_offset;
                    lat = mapy - h_offset;
                }
                var offset= [(wsize/2), ysize];
                map.addOverlay(new ol.Overlay({
                    position: [lon, lat],
                    id: type,
                    offset: offset,
                    title:name,
                    element: $('<img class="location-popover_'+ type +'"   width="'+ wsize +'" height="'+ysize+'" src="'+ icon +'">')
                        .css({marginTop: '-200%', marginLeft: '-50%', cursor: 'pointer'})
                        .attr("id", type)
                        .popover({
                            'placement': 'top',
                            'html': true,
                            'content':'<strong>'+ name + '</strong>'
                        })
                        .on('click', function (e) { $(".location-popover_'+ type +'").not(this).popover('hide'); })
                }));
            }

            changeLayerStatus = function(layerName, visibility) {
                var overlays = map.getOverlays();
                for(var i = 0; i < overlays["b"].length; i++)
                {
                    if(overlays.item(i)["p"]["element"][0].id == layerName)
                    {
                        if(visibility == true)
                        {
                            overlays.item(i)["p"]["element"][0].style.display = "";
                        } else {
                            overlays.item(i)["p"]["element"][0].style.display = "none";
                        }
                    }
                }
            }
        });

    </script>
</head>
<body>
<div id="content">
    <div id="sidebar">
        <h3><?= Html::encode($this->title) ?></h3>
        <div id="layerswitcher" class="olControlLayerSwitcher">
            <div id="allLayers" class="layersDiv">
                <div class="dataLayersDiv">
                    <input name="layer2" type="checkbox" value="layer2" class="olButton" onclick="changeLayerStatus('Dungeon', this.checked)" checked="checked">&nbsp;<img width="19" height="20" style="margin-top:-4px;" src="<?php echo Url::home(true); ?>/image/map/WithIcons/Dungeon.gif">&nbsp;Dungeon<br>
                    <input name="layer1" type="checkbox" value="layer1" class="olButton" onclick="changeLayerStatus('Vendor', this.checked)" checked="checked">&nbsp;<img width="14" height="14" style="margin-top:-6px;" src="<?php echo Url::home(true); ?>/image/map/default2.png">&nbsp;Vendor<br>
                    <input name="layer3" type="checkbox" value="layer3" class="olButton" onclick="changeLayerStatus('Mine', this.checked)" checked="checked">&nbsp;<img width="13" height="13" style="margin-top:-2px;" src="<?php echo Url::home(true); ?>/image/map/WithIcons/Mine.gif">&nbsp;Mine<br>
                    <input name="layer3" type="checkbox" value="layer3" class="olButton" onclick="changeLayerStatus('Town', this.checked)" checked="checked">&nbsp;<img width="19" height="16" style="margin-top:-4px;" src="<?php echo Url::home(true); ?>/image/map/WithIcons/Town.gif">&nbsp;Town<br>
                </div>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="span12"><div style="position: absolute; right: 20px; z-index: 1000; top: 15px;color: #fff;" id="coords"></div></div>
        <div id="map" class="map" tabindex="0">
        </div>
        <div id="progress">Harita yükleniyor, lütfen bekleyin...</div>
    </div>


</body>
</html>