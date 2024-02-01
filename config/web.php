<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    // 'language' => 'ar-AR',
    // 'sourceLanguage' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US', // Source language is English
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'lqLD6ViPGNlxxmpn-HcCALJPMl44O3AM',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'namespace' => 'tests\fixtures',
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // main routes
                'site' => 'site',

                // services routes
                'services' => 'services/index',
                'services/<id:\d+>' => 'services/view',
                'services/<id:\d+>/update' => 'services/update',
                'services/delete<id:\d+>/delete' => 'services/delete',

                // categories routes
                'categories' => 'categories/index',
                'categories/<id:\d+>' => 'categories/view',
                'categories/<id:\d+>/update' => 'categories/update',
                'categories/<id:\d+>/delete' => 'categories/delete',

                // logger routes
                'history' => 'history/index',
                'history/delete-all' => 'history/delete-all',
                'history/delete/<id:\d+>' => 'history/delete',

                // language
                // '<language:\w{2}>' => 'site/index',
                // '<language:\w{2}>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'site/language/<language:\w+>' => 'site/language',
                // Main routes without language
                'motory' => 'site/index',
                '' => 'site/main', // Define your route here
                'site/change-language' => 'site/change-language',


            ],
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
