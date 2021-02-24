<?php

return [

    'merchant' => [
        'local'         => env('PULPAL_TEST_MERCHANT_ID', null),
        'production'    => env('PULPAL_MERCHANT_ID', null),
    ],

    'url' => [
        'local'         => env('PULPAL_TEST_URL', 'https://pay-dev.pulpal.az/payment'),
        'production'    => env('PULPAL_URL', 'https://pay.pulpal.az/payment'),
    ],


    'repeatable'    => env('PULPAL_REPEATABLE', false),

    'salt'          => env('PULPAL_SALT'),

    'key'           => env('PULPAL_KEY'),

    // penny == true ? $pirce  :  $price * 100
    'penny'         => env('PULPAL_PANNY', true),

    'locale'        => [
        'az',
        'en',
        'ru'
    ]
];
