<?php

use yii\helpers\Html;
use yii\web\View;
use app\assets\AppAsset;


$this->title = 'My Yii Application';

// Link to the CSS file
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Almarai' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-GLhlTQ8i04FZ5LE3Fv9uGlLJ+8F5ibTH9WrN8S+GL7JqHq4F2aThFA1RxU2t7ab/" crossorigin="anonymous">

    <?= Html::cssFile('@web/css/motory.css') ?>
    <!-- Bsootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-rREk8e7tFKiQUzF0qc3G4SaOb66Irm/1EQNO3Rrq04vC7EmyPEK3EIfUnQlmh/jt" crossorigin="anonymous">


</head>


<body>
    <!-- <header>
        <div dir="ltr" class="site_logo">
            <?= Html::img('@web/uploads/images/Motory_AR.svg', ['alt' => 'Your Alt Text', 'width' => '200px']) ?>

        </div>
        <div class="data">
            <button class="fillbutton">قدر سعر سيارتك <i class="fas fa-calculator"> </i> </button>
            <button class="filbutton">بيع سيارتك +</button>
            <span><i class="fas fa-globe"></i> English</span>

        </div>

    </header> -->

    <hr>
    <p data-i18n="الرئيسية" class="pagepath">الرئيسية <span data-i18n="خدمات"> / خدمات موتوري</span>
    </p>
    <section class="sam">
        <div class="product_section">
            <h3 data-i18n="خدمات">خدمات موتري</h3>
            <h1><?= Yii::t('app', 'Welcome to our site!') ?></h1>

            <?php foreach ($service as $ser) : ?>

                <div class="productbox">
                    <div>
                        <img width="100%" src="<?= Yii::getAlias('@web') . '/' . $ser->image ?>" />

                    </div>
                    <div>
                        <p class="namecategory"> <?= Html::encode($ser->category->name) ?></p>
                        <h5>
                            <?= Html::encode($ser->name) ?>
                            <span>
                                <?php
                                if ($ser->car_types == "new") {
                                    echo "(للسيارات الجديدة)";
                                } elseif ($ser->car_types == "used") {
                                    echo "(للسيارات المستعملة)";
                                }
                                ?>
                            </span>
                        </h5>
                        <div class=" details">
                            <div class="price">
                                <span data-i18n="سعر" class="priceSpan">سعر الخدمة</span>
                                <p data-i18n="ريال"><?= number_format(Html::encode($ser->price)) ?> ريال</p>
                            </div>
                            <div class="warrntty">
                                <span data-i18n="الضمان" class="priceSpan">الضمان</span>
                                <p data-i18n="سنوات"><?= Html::encode($ser->warranty) ?> سنوات</p>

                            </div>
                        </div>
                    </div>
                    <div class="requste_button">
                        <button data-i18n="شراء" class="border_button">طلب شراء الخدمة</button>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="sidebar">

            <div class="advDetails">
                <p class="adv">أعلن الآن على موتري.كوم</p>
                <p class="advs">تواصل معنا من خلال:
                    <span class="advss">support@motory.com</span>
                </p>
                <div class="logo_side">
                    <?= Html::img('@web/uploads/images/Motory_AR.svg', ['alt' => 'Your Alt Text', 'width' => '100px']) ?>
                </div>
            </div>
        </div>
    </section>
    <?= $this->registerJsFile('@web/JS/translation.js', ['depends' => [AppAsset::class]]) ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>