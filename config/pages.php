<?php
return [
    [
        'permission' => 'dashboard',
        'text' => __('pages.dashboard.title_singular'),
        'href' => route('dashboard'),
        'children' => []
    ],
    [
        'permission' => 'permission_show',
        'text' => __('pages.permissions.title'),
        'href' => route('permissions.index'),
        'children' => []
    ],
    [
        'permission' => 'role_show',
        'text' => __('pages.roles.title'),
        'href' => route('roles.index'),
        'children' => [
            [
                'permission' => 'role_create',
                'text' => __('global.create'),
                'href' => route('roles.create'),
            ],
            [
                'permission' => 'role_edit',
                'text' => __('global.edit'),
                'href' => route('roles.edit'),
            ],
            [
                'permission' => 'role_show',
                'text' => __('global.show'),
                'href' => route('roles.show'),
            ]
        ],
    ],
    [
        'permission' => 'user_show',
        'text' => __('pages.users.title'),
        'href' => route('users.index'),
        'children' => [
            [
                'permission' => 'user_create',
                'text' => __('global.create'),
                'href' => route('roles.create'),
            ],
            [
                'permission' => 'user_edit',
                'text' => __('global.edit'),
                'href' => route('users.edit'),
            ],
            [
                'permission' => 'user_show',
                'text' => __('global.show'),
                'href' => route('users.show'),
            ]
        ],
    ],
    [
        'permission' => 'settings_show',
        'text' => __('pages.settings.title'),
        'href' => route('settings.index'),
        'children' => [
            [
                'permission' => 'settings_show',
                'text' => __('pages.settings.general'),
                'href' => route('settings.general'),
            ],
            [
                'permission' => 'settings_show',
                'text' => __('pages.settings.database'),
                'href' => route('settings.database'),
            ],
            [
                'permission' => 'settings_show',
                'text' => __('pages.settings.debug'),
                'href' => route('settings.debug'),
            ],
            [
                'permission' => 'settings_show',
                'text' => __('pages.settings.log'),
                'href' => route('settings.log'),
            ],
            [
                'permission' => 'settings_show',
                'text' => __('pages.settings.oauth'),
                'href' => route('settings.oauth'),
            ],
            [
                'permission' => 'settings_show',
                'text' => __('pages.settings.mail'),
                'href' => route('settings.mail'),
            ]
        ],
    ],
    [
        'permission' => 'user_show',
        'text' => __('support_ticket.title'),
        'href' => route('support_ticket.index'),
        'children' => [
            [
                'permission' => 'support_ticket_create',
                'text' => __('global.create'),
                'href' => route('support_ticket.create'),
            ],
            [
                'permission' => 'support_ticket_edit',
                'text' => __('global.edit'),
                'href' => route('support_ticket.edit'),
            ],
            [
                'permission' => 'support_ticket_show',
                'text' => __('global.show'),
                'href' => route('support_ticket.show'),
            ]
        ],
    ]
];
