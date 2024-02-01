<?php

use yii\helpers\Html;

$this->title = $service->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="service-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::encode($service->description) ?></p>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td><?= Html::encode($service->name) ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?= Html::encode($service->description) ?></td>
        </tr>
        <tr>
            <th>Price</th>
            <td><?= Html::encode($service->price) ?></td>
        </tr>
        <tr>
            <th>Warranty</th>
            <td><?= Html::encode($service->warranty) ?></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?= Html::encode($service->category->name) ?></td>
        </tr>
        <tr>
            <th>Car Types</th>
            <td><?= Html::encode($service->car_types) ?></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><?= Html::img(Yii::getAlias('@web/' . $service->image), ['alt' => 'Image', 'style' => 'width:100px;']) ?></td>
        </tr>
    </table>

</div>