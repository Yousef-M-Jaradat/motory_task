<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'History Records';
$this->params['breadcrumbs'][] = $this->title;

$deleteAllConfirmation = 'Are you sure you want to delete all history records?';
$deleteConfirmation = 'Are you sure you want to delete this history record?';
$counter = 1;
$js = <<<JS
    $('#delete-all-btn').on('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: '$deleteAllConfirmation',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete all!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = $(this).attr('href');
            }
        });
    });

    $('.delete-btn').on('click', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).attr('href');
        Swal.fire({
            title: '$deleteConfirmation',
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

<?= Html::a('Delete All', ['delete-all'], [
    'class' => 'btn btn-danger',
    'id' => 'delete-all-btn',
]) ?>

<?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $history]),
    'columns' => [
        [
            'attribute' => 'recordNumber',
            'label' => 'No.',
            'value' => function () use (&$counter) {
                return $counter++;
            },
            'headerOptions' => ['style' => 'width:80px;'],
        ],
        'action',
        'details',
        'created_at:datetime',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}',
            'buttons' => [
                'delete' => function ($url, $model) {
                    return Html::a('<span class="btn btn-danger">delete</span>', ['delete', 'id' => $model->id], [
                        'class' => 'delete-btn',
                    ]);
                },
            ],
        ],
    ],
]); ?>