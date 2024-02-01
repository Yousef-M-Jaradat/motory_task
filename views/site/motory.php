<?php

use yii\helpers\Html;
use yii\web\View;
use app\assets\AppAsset;

?>




<body>
    <!-- <header>
        <div dir="ltr" class="site_logo">
            <?= Html::img('@web/uploads/images/Motory_AR.svg', ['alt' => 'Your Alt Text', 'width' => '200px']) ?>

        </div>
       

    </header> -->
    <button id="helpButton" class="help-btn">Main Page</button>
    <hr>
    <p data-i18n="الرئيسية" class="pagepath">الرئيسية <span data-i18n="خدمات"> / خدمات موتوري</span>
    </p>
    <section class="grid-box">
        <div class="product_section">
            <h3 data-i18n="خدمات">خدمات موتري</h3>

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
    <?= Html::jsFile('@web/js/motory.js') ?>