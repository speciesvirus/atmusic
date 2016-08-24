<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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

    'domain' => [
//        'default' => 'http://localhost/atmusic/search/2-1=0',
        'default' => 'http://localhost/atmusic',
    ],

//    'google' => [
//        'default' => 'http://localhost/atmusic/search/2-1=0',
//        'key' => 'AIzaSyDGFbK0CvMXKVzCJA_2Fj5B7pItfK0a1QA',
//    ],

    'facebook' => [
        'client_id' => '950643235062155',
        'client_secret' => 'e66d7d3dd01930aab44916b42c6bdd3b',
        'redirect' => 'http://localhost/atmusic/callback/facebook',
        //'redirect' => 'http://www.unbok.com/callback/facebook',
    ],

    'google' => [
        'client_id' => '493662001300-ltq4pt04gfnrplgb2kvjo54fslnpo3p6.apps.googleusercontent.com',
        'client_secret' => 'u4na4P845bHq6ypCGVrxiJYk',
        'redirect' => 'http://localhost/atmusic/callback/google',
        //'redirect' => 'http://www.unbok.com/callback/google',
        'key' => 'AIzaSyDs-xqZ9eBPASEi0pFCSjf8JS3-FYVJ2pI',
        //'key' => 'AIzaSyDGFbK0CvMXKVzCJA_2Fj5B7pItfK0a1QA',

    ],

];
