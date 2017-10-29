<?php
/* @var $this yii\web\View */
use app\models\Server;

$data = Server::findOne(1);
?>
<div id="container-capacity" style="width: 100%; height: 208px; float: left"></div>
<script type="text/javascript">
    var gaugeOptions = {

        chart: {
            type: 'solidgauge'
        },

        title: null,

        pane: {
            center: ['50%', '85%'],
            size: '140%',
            startAngle: -90,
            endAngle: 90,
            background: {
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || '#EEE',
                innerRadius: '60%',
                outerRadius: '100%',
                shape: 'arc'
            }
        },

        tooltip: {
            enabled: false
        },

        // the value axis
        yAxis: {
            stops: [
                [0.1, '#55BF3B'], // green
                [0.5, '#DDDF0D'], // yellow
                [0.9, '#DF5353'] // red
            ],
            lineWidth: 0,
            minorTickInterval: null,
            tickAmount: 2,
            title: {
                y: -75
            },
            labels: {
                y: 16
            }
        },

        plotOptions: {
            solidgauge: {
                dataLabels: {
                    y: 5,
                    borderWidth: 0,
                    useHTML: true
                }
            }
        }
    };

    // The speed gauge
    var chartSpeed = Highcharts.chart('container-capacity', Highcharts.merge(gaugeOptions, {
        yAxis: {
            min: 0,
            max: <?php echo $data->capacity; ?>,
            title: {
                text: 'Kullanıcı'
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Kullanıcı',
            data: [<?php echo $data->currentOnline; ?>],
            dataLabels: {
                format: '<div style="text-align:center"><span style="font-size:25px;color:' +
                ((Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black') + '">{y}</span><br/>' +
                '<span style="font-size:12px;color:silver">kullanıcı</span></div>'
            },
            tooltip: {
                valueSuffix: ' kullanıcı'
            }
        }]

    }));
</script>

