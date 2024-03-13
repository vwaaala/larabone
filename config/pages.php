<?php
return [
    [
        'permission' => 'dashboard',
        'name' => 'pages.dashboard.title_singular',
        'text' => 'global.all',
        'href' => 'dashboard',
        'include_routes' => [],
        'children' => []
    ],
    [
        'permission' => 'permission_show',
        'name' => 'pages.permissions.title',
        'text' => 'global.all',
        'href' => 'permissions.index',
        'include_routes' => [],
        'children' => []
    ],
    [
        'permission' => 'role_show',
        'name' => 'pages.roles.title',
        'text' => 'global.all',
        'href' => 'roles.index',
        'include_routes' => ['roles.edit'],
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
        'include_routes' => ['users.edit', 'users.show'],
        'children' => [
            [
                'permission' => 'user_create',
                'text' => 'global.create',
                'href' => 'users.create',
            ]
        ]
    ],
    [
        'permission' => 'support_ticket_show',
        'name' => 'support_ticket.title',
        'text' => 'global.all',
        'href' => 'support_ticket.index',
        'include_routes' => ['support_ticket.show'],
        'children' => [
            [
                'permission' => 'support_ticket_create',
                'text' => 'global.create',
                'href' => 'support_ticket.create',
            ]
        ]
    ],
    [
        'permission' => 'settings_show',
        'name' => 'pages.settings.title',
        'text' => 'global.all',
        'href' => 'settings.index',
        'include_routes' => [],
        'children' => [
            [
                'permission' => 'settings_show',
                'text' => 'global.general',
                'href' => 'settings.generalInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.database',
                'href' => 'settings.databaseInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.debug',
                'href' => 'settings.debugInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.log',
                'href' => 'settings.logInfo',
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.mail',
                'href' => 'settings.mailInfo',
            ]
        ],
    ]
];
