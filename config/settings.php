<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Agent Settings
    |--------------------------------------------------------------------------
    |
    | These are the default values for an agent created for an organization
    |
    */

    'agent' => [
        'password' => env('AGENT_PASSWORD', 'Pass2101#'),
    ],

    'sms' => [
        'costPerMessage' => 3,
        'charactersPerMessage' => 160,
    ],

];
