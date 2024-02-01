<?php

use yii\helpers\Html;
use yii\web\View;
use app\assets\AppAsset;
use yii\helpers\Url;


$this->title = Yii::t('app', 'Admin Dashboard');

?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">

<html lang="en">

<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://fonts.googleapis.com/css?family=Almarai' rel='stylesheet'>

  <?= Html::cssFile('@web/css/motory.css') ?>
  <?= Html::cssFile('@web/css/admin.css') ?>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  

  <main class="container mt-4">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= Yii::t('app', 'Services') ?></h5>
            <p class="card-text"><?= Yii::t('app', 'Description of services') ?></p>
            <?= Html::a(Yii::t('app', 'Go to Services'), ['services/index'], ['class' => 'btn btn-primary']) ?>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= Yii::t('app', 'Categories') ?></h5>
            <p class="card-text"><?= Yii::t('app', 'Description of categories') ?></p>
            <?= Html::a(Yii::t('app', 'Go to Categories'), ['categories/index'], ['class' => 'btn btn-primary']) ?>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= Yii::t('app', 'History Logging') ?></h5>
            <p class="card-text"><?= Yii::t('app', 'Description of history logging') ?></p>
            <?= Html::a(Yii::t('app', 'Go to History Logging'), ['history/index'], ['class' => 'btn btn-primary']) ?>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?= Yii::t('app', 'Main Page') ?></h5>
            <p class="card-text"><?= Yii::t('app', 'Description of the main page') ?></p>
            <?= Html::a(Yii::t('app', 'Go to Main Page'), ['site/index'], ['class' => 'btn btn-primary']) ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- jQuery, Popper.js, Bootstrap JS -->
  <?= Html::jsFile('https://code.jquery.com/jquery-3.6.4.min.js') ?>

  <?= Html::jsFile('https://code.jquery.com/jquery-3.3.1.slim.min.js', ['integrity' => 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo', 'crossorigin' => 'anonymous']) ?>
  <?= Html::jsFile('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', ['integrity' => 'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1', 'crossorigin' => 'anonymous']) ?>
  <?= Html::jsFile('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', ['integrity' => 'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM', 'crossorigin' => 'anonymous']) ?>

</body>

</html>