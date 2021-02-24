<?php
/*

 private $testMerchantId = 489;
    private $testUrl = 'https://pay-dev.pulpal.az/payment';

    private $prodMerchantId = 477;
    private $prodUrl = 'https://pay.pulpal.az/payment';

    private $salt = 'dy!HV2@k38c#2w&m@iZQ';
    private $repeatable = 'false';
    public static $key = 'p2@lz$asj9L@XAq#lM$4';


 */
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
