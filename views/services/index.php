<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\JsExpression;

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;

$counter = 1;
$js = <<<JS
    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteUrl;
            }
        });
    });
JS;

$this->registerJs($js, \yii\web\View::POS_READY);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>

<?= GridView::widget([
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
        ],
        'car_types',
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
                    return Html::a('<span class="btn btn-danger delete-btn">delete</span>', ['delete', 'id' => $model->id], [
                        'class' => 'delete-btn',
                    ]);
                },
            ],
        ],
    ],
]); ?>