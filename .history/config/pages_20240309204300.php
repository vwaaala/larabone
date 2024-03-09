<?php
return [
    "dashboard" => [
        "route" => "dashboard",
        "trans" => "pages.dashboard.title_singular",
        "parent" => true
    ],
    "permissions" => [
        "index" => [
            "namespace" => "permissions.",
            "route" => "permissions.index",
            "trans" => "pages.permissions.title",
            "parent" => true
        ],
    ],
    "roles" => [
        "index" => [
            "namespace" => "roles.",
            "route" => "roles.index",
            "trans" => "pages.roles.title",
            "parent" => true
        ],
        "create" => [
            "namespace" => "roles.",
            "route" => "roles.create",
            "trans" => "global.create",
            "parent" => false
        ],
        "edit" => [
            "namespace" => "users.",
            "route" => "roles.edit",
            "trans" => "global.edit",
            "parent" => false
        ],
        "show" => [
            "namespace" => "roles.",
            "route" => "roles.show",
            "trans" => "global.show",
            "parent" => false
        ],
    ],
    "users" => [
        "index" => [
            "namespace" => "users.",
            "route" => "users.index",
            "trans" => "pages.users.title",
            "parent" => true
        ],
        "create" => [
            "namespace" => "users.",
            "route" => "users.create",
            "trans" => "global.create",
            "parent" => false
        ],
        "edit" => [
            "namespace" => "users.",
            "route" => "users.edit",
            "trans" => "global.edit",
            "parent" => false
        ],
        "show" => [
            "namespace" => "users.",
            "route" => "users.show",
            "trans" => "global.show",
            "parent" => false
        ],
    ],
    "settings" => [
        "index" => [
            "namespace" => "settings.",
            "route" => "settings.index",
            "trans" => "pages.settings.title",
            "parent" => true
        ],
        "general"=> [
            "namespace" => "settings.",
            "route" => "settings.general",
            "trans" => "pages.settings.general",
            "parent" => false
        ],
        "database"=> [
            "namespace" => "settings.",
            "route" => "settings.database",
            "trans" => "pages.settings.database",
            "parent" => false
        ],
        "debug"=> [
            "namespace" => "settings.",
            "route" => "settings.debug",
            "trans" => "pages.settings.debug",
            "parent" => false
        ],
        "log"=> [
            "namespace" => "settings.",
            "route" => "settings.log",
            "trans" => "pages.settings.log",
            "parent" => false
        ],
        "oauth"=> [
            "namespace" => "settings.",
            "route" => "settings.oauth",
            "trans" => "pages.settings.oauth",
            "parent" => false
        ],
        "smtp"=> [
            "namespace" => "settings.",
            "route" => "settings.smtp",
            "trans" => "pages.settings.smtp",
            "parent" => false
        ],
    ],
    "support_ticket" => [
        "index" => [
            "namespace" => "support_ticket.",
            "route" => "support_ticket.index",
            "trans" => "support_ticket.title",
            "parent" => true
        ],
        "create" => [
            "namespace" => "support_ticket.",
            "route" => "support_ticket.create",
            "trans" => "global.create",
            "parent" => false
        ],
        "edit" => [
            "namespace" => "support_ticket.",
            "route" => "users.edit",
            "trans" => "global.edit",
            "parent" => false
        ],
        "show" => [
            "namespace" => "support_ticket.",
            "route" => "support_ticket.show",
            "trans" => "global.show",
            "parent" => false
        ],
    ]
];
