<?php
/* @var $this yii\web\View */

use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = 'Karakter Listesi';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo GridView::widget([
    'dataProvider' => $model,
    'export' => false,
    'responsive'=>true,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'account'
        ],
        [
            'attribute' => 'name',
            'format' => 'raw',
            'value'=>function ($data) {
                return "<a href='". Url::to(['stat/char_detail', 'char' => $data->serial])."'>". $data->name ."</a>";
            },
        ],

        [
            'class' => '\kartik\grid\BooleanColumn',
            'attribute' => 'is_online',
            'trueLabel' => 'Evet',
            'falseLabel' => 'Hayır'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'gold'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'dam'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'ostr'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'odex'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'oint'
        ]
    ]
    // other widget settings
]);

?>