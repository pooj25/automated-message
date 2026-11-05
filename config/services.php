<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'openwa' => [
        'url' => env('OPENWA_URL', 'http://localhost:2785'),
        'api_key' => env('OPENWA_API_KEY', 'owa_k1_4c55b901515813692186149175caf552e99e06ee76dc9d578a6114301703ac87'),
        'session_id' => env('OPENWA_SESSION_ID', 'd8721c9c-6e77-4be8-bbf8-29732fbbfd9f'),
        'recipient' => env('OPENWA_RECIPIENT_PHONE', '919876543210'),
    ],

];
