<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing permissions for the default roles on the system
    |
    */

    'owner' => [
        'settings' => [
            'team' => [
                'view' => true,
                'members' => [
                    'update' => true,
                    'view' => true,
                ],
                'invitations' => [
                    'view' => true,
                    'create' => true,
                    'delete' => true,
                ],
                'roles' => [
                    'view' => true,
                    'create' => true,
                    'update' => true,
                ],
            ],
        ],
        'elections' => [
            'view' => true,
            'create' => true,
            'update' => true,
            'delete' => true,
        ],
    ],

    'admin' => [
        'settings' => [
            'team' => [
                'view' => true,
                'members' => [
                    'update' => true,
                    'view' => true,
                ],
                'invitations' => [
                    'view' => true,
                    'create' => true,
                    'delete' => true,
                ],
                'roles' => [
                    'view' => true,
                    'create' => true,
                    'update' => true,
                ],
            ],
        ],
        'elections' => [
            'view' => true,
            'create' => true,
            'update' => true,
            'delete' => true,
        ],
    ],

    'member' => [
        'settings' => [
            'team' => [
                'view' => false,
                'members' => [
                    'update' => false,
                    'view' => false,
                ],
                'invitations' => [
                    'view' => false,
                    'create' => false,
                    'delete' => false,
                ],
                'roles' => [
                    'view' => false,
                    'create' => false,
                    'update' => false,
                ],
            ],
        ],
        'elections' => [
            'view' => true,
            'create' => true,
            'update' => true,
            'delete' => true,
        ],
    ],

    'agent' => [
        'settings' => [
            'team' => [
                'view' => false,
                'members' => [
                    'update' => false,
                    'view' => false,
                ],
                'invitations' => [
                    'view' => false,
                    'create' => false,
                    'delete' => false,
                ],
                'roles' => [
                    'view' => false,
                    'create' => false,
                    'update' => false,
                ],
            ],
        ],
        'elections' => [
            'view' => false,
            'create' => false,
            'update' => false,
            'delete' => false,
        ],
    ],
];
