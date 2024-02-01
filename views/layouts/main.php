<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Almarai' rel='stylesheet'>
    <?= Html::cssFile('@web/css/motory.css') ?>
    <?= Html::cssFile('@web/css/output.css') ?>
    <?= Html::cssFile('@web/css/output.css.map') ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Use the correct SRI value for Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-rREk8e7tFKiQUzF0qc3G4SaOb66Irm/1EQNO3Rrq04vC7EmyPEK3EIfUnQlmh/jt" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="my_container" id="newnav">
        <nav class="navbar navbar-expand-lg navbar-light ">

            <?= Html::a(
                Html::img('@web/uploads/images/Logo.svg', ['alt' => 'Your Logo', 'width' => '91px', 'height' => '48px']),
                ['site/'],
                ['class' => 'navbar-brand']
            ) ?>
            <div dir="ltr" class='header_button'>
                <button class="fillbutton"> <i class="fas fa-calculator"> </i> </button>
                <button class="filbutton"></button>
                <a href="#" class="world" data-lang="en"><i class="fas fa-globe"></i> English</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse" id="navbarTogglerDemo02" style="display: none !important;">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <li class="nav-item">
                            <?= Html::a(Yii::t('app', 'Motory'), ['/site/motory'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="my_container">
            <?php if (!empty($this->params['breadcrumbs'])) : ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <?php $this->endBody() ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
<?php $this->endPage() ?>