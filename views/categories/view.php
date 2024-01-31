<?php
use yii\helpers\Html;

$this->title = $categories->name;
$this->params['breadcrumbs'][] = ['label' => 'category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::encode($categories->description) ?></p>