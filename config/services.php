<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Third Party Services
      |--------------------------------------------------------------------------
      |
      | This file is for storing the credentials for third party services such
      | as Stripe, Mailgun, SparkPost and others. This file provides a sane
      | default location for this type of information, allowing packages
      | to have a conventional place to find your various credentials.
      |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id' => '104026953675651',
        'client_secret' => '2a4cb5c34ca789c01ffa61c855e6fddf',
        'redirect' => 'http://blog.loc/auth/facebook/callback',
    ],
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('CALLBACK_URL'),
    ],
    'twitter' => [
        'client_id' => 'vXoYqbMWQICXEJ50s4rrENIPv',
        'client_secret' => 'DTkDWIzak8Ey4szxnW87NzUaaEHiyEPiK4xnBbuVcm5Vpa7NZm',
        'redirect' => 'http://blog.loc/auth/twitter/callback',
    ],
];
