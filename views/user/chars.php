<?php
/* @var $this yii\web\View */

use kartik\grid\GridView;

?>
<?php echo GridView::widget([
    'dataProvider' => $model,
    'export' => false,
    'responsive'=>true,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'name'
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
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'hits'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'stam'
        ],
        [
            'class' => '\kartik\grid\DataColumn',
            'attribute' => 'mana'
        ]
    ]
    // other widget settings
]);

?>