<?php

return [
    // "sms.ru", "array"
    'driver' => env('SMS_DRIVER', 'sms.ru'),

    'drivers' => [
        'sms.ru' => [
            'app_id' => env('SMS_SMS_RU_APP_ID'),
            'url' => env('SMS_SMS_RU_URL'),
        ],
    ],
];