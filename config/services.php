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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_CALLBACK_URL'),
    ],

    'arkesel' => [
        'url' => env('ARKESEL_URL'),
        'key' => env('ARKESEL_KEY'),
        'otp' => [
            'sender' => env('ARKESEL_OTP_SENDER', env('APP_NAME')),
            'message' => env('ARKESEL_OTP_MESSAGE', 'Your ' . env('APP_NAME') . ' verification code: %otp_code%. Do not share this code with anyone.'),
            'medium' => env('ARKESEL_OTP_MEDIUM', 'sms'),
            'type' => env('ARKESEL_OTP_TYPE', 'numeric'),
            'expiry' => (int)env(
                'ARKESEL_OTP_EXPIRY',
                10
            ),
            'length' => (int)env('ARKESEL_OTP_LENGTH', 6),
            'urls' => [
                'send' => env('ARKESEL_OTP_URLS_SEND'),
                'verify' => env('ARKESEL_OTP_URLS_VERIFY'),
            ],
        ]
    ]

];
