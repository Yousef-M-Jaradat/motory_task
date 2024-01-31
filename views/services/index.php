<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>

<?php
$counter = 1;
echo GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $services]),
    'columns' => [
        [
            'attribute' => 'recordNumber',
            'label' => 'No.',
            'value' => function () use (&$counter) {
                return $counter++;
            },
            'headerOptions' => ['style' => 'width:80px;'],
        ],
        'name',
        'price',
        [
            'attribute' => 'warranty',
            'label' => 'Warranty',
            'value' => function ($model) {
                return $model->warranty . ' years';
            },
        ],        'car_types',
        [
            'attribute' => 'image',
            'format' => 'html',
            'value' => function ($model) {
                return Html::img(Yii::getAlias('@web/' . $model->image), ['alt' => 'Image', 'style' => 'width:50px;']);
            },
        ],
        [
            'attribute' => 'category.name',
            'label' => 'Category',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => '{view} {update} {delete}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="btn btn-info">view</span>', ['view', 'id' => $model->id]);
                },
                'update' => function ($url, $model) {
                    return Html::a('<span class="btn btn-secondary">update</span>', ['update', 'id' => $model->id]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="btn btn-danger">delete</span>', ['delete', 'id' => $model->id], [
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ],
]);
?>