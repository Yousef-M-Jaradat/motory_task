<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;


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

$this->registerJs($js);
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>

<?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $Categories]),
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
        'description',
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
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
                },
            ],
        ],
    ],
]); ?>