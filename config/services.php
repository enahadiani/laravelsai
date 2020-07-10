<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'midtrans' => [
        // Midtrans server key
        'serverKey'     => env('MIDTRANS_SERVERKEY'),
        // Midtrans client key
        'clientKey'     => env('MIDTRANS_CLIENTKEY'),
        // Isi false jika masih tahap development dan true jika sudah di production, default false (development)
        'isProduction'  => env('MIDTRANS_IS_PRODUCTION', false),
        'isSanitized'   => env('MIDTRANS_IS_SANITIZED', true),
        'is3ds'         => env('MIDTRANS_IS_3DS', true),                
    ],
    'github' => [
        'client_id' => '372e99918bc8eb7fac71',
        'client_secret' => '98ced344ed28619fd43f06a6c83e518e44b5c8c4',
        'redirect' => 'http://app.simkug.com/socialite/callback/github',
    ], 

];
