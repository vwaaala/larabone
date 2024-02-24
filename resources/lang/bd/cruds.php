<?php

return [
    'userManagement' => [
        'header'          => 'ব্যবহারকারী ব্যবস্থাপনা',
        'title'          => 'ব্যবহারকারী এবং ভূমিকা',
        'title_singular' => 'ব্যবহারকারী এবং ভূমিকা',
    ],
    'permission'     => [
        'title'          => 'অনুমতি',
        'title_singular' => 'অনুমতি',
        'fields'         => [
            'id'                => 'আইডি',
            'id_helper'         => '',
            'title'             => 'নাম',
            'title_helper'      => '',
            'created_at'        => 'তৈরি হয়েছে',
            'created_at_helper' => '',
            'updated_at'        => 'হালনাগাদ হয়েছে',
            'updated_at_helper' => '',
            'deleted_at'        => 'মুছে ফেলা হয়েছে',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'ভূমিকা',
        'title_singular' => 'ভূমিকা',
        'fields'         => [
            'id'                => 'আইডি',
            'id_helper'         => '',
            'title'             => 'নাম',
            'title_helper'      => '',
            'permissions'        => 'ভূমিকা',
            'permissions_helper' => '',
            'created_at'        => 'তৈরি হয়েছে',
            'created_at_helper' => '',
            'updated_at'        => 'হালনাগাদ হয়েছে',
            'updated_at_helper' => '',
            'deleted_at'        => 'মুছে ফেলা হয়েছে',
            'deleted_at_helper' => '',
        ],
    ],
    'user'           => [
        'title'          => 'ব্যবহারকারী',
        'title_singular' => 'ব্যবহারকারী',
        'fields'         => [
            'id'                => 'আইডি',
            'id_helper'         => '',
            'title'             => 'নাম',
            'title_helper'      => 'ব্যাবহারকারির নাম',
            'email'                    => 'ইমেইল',
            'email_helper'             => 'ব্যাবহারকারির ইমেইল',
            'email_verified_at'        => 'ইমেল যাচাই করা হয়েছে',
            'email_verified_at_helper' => 'ব্যাবহারকারির ইমেইল যাচাই হয়েছে',
            'password'                 => 'পাসওয়ার্ড',
            'password_confirm'         => 'পাসওয়ার্ড নিশ্চিত করুন',
            'password_helper'          => '',
            'roles'                    => 'ভূমিকা',
            'roles_helper'             => '',
            'remember_token'           => 'লগইন টোকেন মনে রাখবে',
            'remember_token_helper'    => '',
            'created_at'        => 'তৈরি হয়েছে',
            'created_at_helper' => '',
            'updated_at'        => 'হালনাগাদ হয়েছে',
            'updated_at_helper' => '',
            'deleted_at'        => 'মুছে ফেলা হয়েছে',
            'deleted_at_helper' => '',
        ],
    ],
];
