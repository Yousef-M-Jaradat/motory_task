<?php

Yii::setAlias('@imagesPath', 'C:\xampp\htdocs\basic\web\uploads\images\\');
Yii::setAlias('@imagesUrl', 'http://localhost:8080/uploads/images');

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'languages' => [
        'en' => 'English',
        'ar' => 'العربية',
    ]
];
