<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Update Category';
$this->params['breadcrumbs'][] = ['label' => 'category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($categories, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($categories, 'description')->textarea(['rows' => 6]) ?>



<div class="form-group">
    <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>