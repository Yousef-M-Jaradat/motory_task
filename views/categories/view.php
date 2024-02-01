<?php
use yii\helpers\Html;

$this->title = $categories->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::encode($categories->description) ?></p>

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td><?= Html::encode($categories->name) ?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?= Html::encode($categories->description) ?></td>
        </tr>

    </table>

</div>
