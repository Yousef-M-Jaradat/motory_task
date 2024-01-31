<?php
use yii\helpers\Html;

$this->title = $service->name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p><?= Html::encode($service->description) ?></p>