<?php
return [
    [
        'permission' => 'dashboard',
        'name' => 'pages.dashboard.title_singular',
        'text' => 'global.dashboard',
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
                'sidebar' => true
            ],
            [
                'permission' => 'role_edit',
                'text' => 'global.edit',
                'href' => 'roles.edit',
                'sidebar' => false
            ],
            [
                'permission' => 'role_show',
                'text' => 'global.show',
                'href' => 'roles.show',
                'sidebar' => false
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
                'sidebar' => true
            ],
            [
                'permission' => 'users_edit',
                'text' => 'global.edit',
                'href' => 'users.edit',
                'sidebar' => false
            ],
            [
                'permission' => 'users_show',
                'text' => 'global.show',
                'href' => 'users.show',
                'sidebar' => false
            ]
        ]
    ],
    [
        'permission' => 'support_ticket_show',
        'name' => 'support_ticket.title',
        'text' => 'global.all',
        'href' => 'support_ticket.index',
        'children' => [
            [
                'permission' => 'support_ticket_create',
                'text' => 'global.create',
                'href' => 'support_ticket.create',
                'sidebar' => true
            ],
            [
                'permission' => 'support_ticket_edit',
                'text' => 'global.edit',
                'href' => 'support_ticket.edit',
                'sidebar' => false
            ],
            [
                'permission' => 'support_ticket_show',
                'text' => 'global.show',
                'href' => 'support_ticket.show',
                'sidebar' => false
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
                'text' => 'global.general',
                'href' => 'settings.generalInfo',
                'sidebar' => true
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.database',
                'href' => 'settings.databaseInfo',
                'sidebar' => true
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.debug',
                'href' => 'settings.debugInfo',
                'sidebar' => true
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.log',
                'href' => 'settings.logInfo',
                'sidebar' => true
            ],
            [
                'permission' => 'settings_show',
                'text' => 'global.mail',
                'href' => 'settings.mailInfo',
                'sidebar' => true
            ]
        ]
    ]
];
