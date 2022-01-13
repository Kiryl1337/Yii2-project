<?php
return [
    'coursework_record/index' => [
        'type' => 2,
    ],
    'coursework_record/view' => [
        'type' => 2,
    ],
    'coursework_record/update' => [
        'type' => 2,
    ],
    'diplom_record/index' => [
        'type' => 2,
    ],
    'diplom_record/view' => [
        'type' => 2,
    ],
    'diplom_record/update' => [
        'type' => 2,
    ],
    'coursework/index' => [
        'type' => 2,
    ],
    'diplom/index' => [
        'type' => 2,
    ],
    'login' => [
        'type' => 2,
    ],
    'logout' => [
        'type' => 2,
    ],
    'error' => [
        'type' => 2,
    ],
    'signup' => [
        'type' => 2,
    ],
    'admin/index' => [
        'type' => 2,
    ],
    'admin/upload' => [
        'type' => 2,
    ],
    'admin/coursework/index' => [
        'type' => 2,
    ],
    'admin/coursework/view' => [
        'type' => 2,
    ],
    'admin/coursework/create' => [
        'type' => 2,
    ],
    'admin/coursework/update' => [
        'type' => 2,
    ],
    'admin/coursework/delete' => [
        'type' => 2,
    ],
    'admin/diplom/index' => [
        'type' => 2,
    ],
    'admin/diplom/view' => [
        'type' => 2,
    ],
    'admin/diplom/create' => [
        'type' => 2,
    ],
    'admin/diplom/update' => [
        'type' => 2,
    ],
    'admin/diplom/delete' => [
        'type' => 2,
    ],
    'admin/group/index' => [
        'type' => 2,
    ],
    'admin/group/view' => [
        'type' => 2,
    ],
    'admin/group/create' => [
        'type' => 2,
    ],
    'admin/group/update' => [
        'type' => 2,
    ],
    'admin/group/delete' => [
        'type' => 2,
    ],
    'admin/user/index' => [
        'type' => 2,
    ],
    'admin/user/view' => [
        'type' => 2,
    ],
    'admin/user/update' => [
        'type' => 2,
    ],
    'admin/user/delete' => [
        'type' => 2,
    ],
    'guest' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'login',
            'logout',
            'error',
            'signup',
        ],
    ],
    'student' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'coursework_record/index',
            'coursework_record/view',
            'coursework_record/update',
            'diplom_record/index',
            'diplom_record/view',
            'diplom_record/update',
            'coursework/index',
            'diplom/index',
        ],
    ],
    'teacher' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'guest',
            'admin/coursework/index',
            'admin/coursework/view',
            'admin/coursework/create',
            'admin/coursework/update',
            'admin/coursework/delete',
            'admin/diplom/index',
            'admin/diplom/view',
            'admin/diplom/create',
            'admin/diplom/update',
            'admin/diplom/delete',
            'admin/group/index',
            'admin/group/view',
            'admin/group/create',
            'admin/group/update',
            'admin/group/delete',
            'coursework/index',
            'diplom/index',
        ],
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userRole',
        'children' => [
            'guest',
            'teacher',
            'admin/index',
            'admin/upload',
            'admin/user/index',
            'admin/user/view',
            'admin/user/update',
            'admin/user/delete',
            'coursework/index',
            'diplom/index',
        ],
    ],
];
