<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Update Service';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($service, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($service, 'description')->textarea(['rows' => 6]) ?>
<?= $form->field($service, 'price')->textInput(['maxlength' => true]) ?>
<?= $form->field($service, 'warranty')->textInput(['maxlength' => true]) ?>

<?= $form->field($service, 'category_id')->dropDownList(
    ArrayHelper::map($categories, 'id', 'name'),
    ['prompt' => 'Select Category']
) ?>

<?= $form->field($service, 'car_types')->dropDownList(
    array_combine($enumValues, $enumValues),
    ['prompt' => 'Select Car Type']
) ?>

<?= $form->field($service, 'imageFile')->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>