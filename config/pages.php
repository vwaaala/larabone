<?php
return [
    [
        'permission' => 'dashboard',
        'name' => 'pages.dashboard.title_singular',
        'text' => 'global.all',
        'href' => 'dashboard',
        'children' => []
    ],
    [
        'permission' => 'permission_show',
        'name' => 'pages.permissions.title',
        'text' => 'global.all',
        'href' => 'permissions.index',
        'children' => []
    ],
    [
        'permission' => 'role_show',
        'name' => 'pages.roles.title',
        'text' => 'global.all',
        'href' => 'roles.index',
        'children' => [
            [
                'permission' => 'role_create',
                'text' => 'global.create',
                'href' => 'roles.create',
            ]
        ]
    ],
    [
        'permission' => 'user_show',
        'name' => 'pages.users.title',
        'text' => 'global.all',
        'href' => 'users.index',
        'children' => [
            [
                'permission' => 'user_create',
                'text' => 'global.create',
                'href' => 'users.create',
            ]
        ]
    ],
    [
        'permission' => 'settings_show',
        'name' => 'pages.settings.title',
        'text' => 'global.all',
        'href' => 'settings.index',
        'children' => [
            [
                'permission' => 'settings_show',
                'text' => 'pages.settings.generalInfo',
                'href' => 'settings.generalInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'pages.settings.databaseInfo',
                'href' => 'settings.databaseInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'pages.settings.debugInfo',
                'href' => 'settings.debugInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'pages.settings.logInfo',
                'href' => 'settings.logInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'pages.settings.mailInfo',
                'href' => 'settings.mailInfo',
            ]
        ],
    ],
    [
        'permission' => 'user_show',
        'name' => 'support_ticket.title',
        'text' => 'global.all',
        'href' => 'support_ticket.index',
        'children' => [
            [
                'permission' => 'support_ticket_create',
                'text' => 'global.create',
                'href' => 'support_ticket.create',
            ]
        ]
    ]
];
