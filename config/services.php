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
        //'default' => 'http://localhost/atmusic/search/2-1=0',
        'default' => 'http://www.unbok.com',
    ],


    'facebook' => [
        'client_id' => '950643235062155',
        'client_secret' => 'e66d7d3dd01930aab44916b42c6bdd3b',
        'redirect' => 'http://www.unbok.com/callback/facebook',
    ],

    'google' => [
        'client_id' => '493662001300-c4cs3m4hh96sov9qh6jo1sm0cb8br6jn.apps.googleusercontent.com',
        'client_secret' => 'AJnajx3ii2FSnaMAp0QX9L6r',
//        'redirect' => 'http://www.unbok.com/callback/google',
        'key' => 'AIzaSyAvoJpKbVU5poSAjGlaC8K-lUUdlioAwt4',

//        'client_id' => '493662001300-opese7j7pvjdd3kip38n6e65mc2b68t7.apps.googleusercontent.com',
//        'client_secret' => 'QXBtFysQvZaF-jvt-2NcVJ7l',
        'redirect' => 'http://localhost/atmusic/callback/google',
    ],

];
