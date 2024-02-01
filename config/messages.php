<?php

return [
    'sourcePath' => __DIR__ . '/../',
    'languages' => ['en', 'ar'], // Add more languages as needed
    'translator' => 'Yii::t',
    'sort' => true,
    'removeUnused' => false,
    'only' => ['*.php'],
    'except' => [
        '/tests',
        '/vendor',
        '/runtime',
        '/config',
        '/messages',
        '/assets',
    ],
    'format' => 'php',
    'messagePath' => __DIR__ . '/../messages',
    'overwrite' => true,
];
