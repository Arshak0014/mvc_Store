<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'cabinet' => [
        'controller' => 'cabinet',
        'action' => 'index',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],

//    admin routes

    'admin' => [
        'controller' => 'admin',
        'action' => 'index',
    ],
    'admin/category' => [
        'controller' => 'adminCategory',
        'action' => 'index',
    ],
    'admin/category/create' => [
        'controller' => 'adminCategory',
        'action' => 'create',
    ],
    'admin/category/update/([1-9]+)' => [
        'controller' => 'adminCategory',
        'action' => 'update',
    ],
    'admin/category/delete/([1-9]+)' => [
        'controller' => 'adminCategory',
        'action' => 'delete',
    ],


    'admin/product' => [
        'controller' => 'adminProduct',
        'action' => 'index',
    ],
    'admin/product/create' => [
        'controller' => 'adminProduct',
        'action' => 'create',
    ],
    'admin/product/update' => [
        'controller' => 'adminProduct',
        'action' => 'update',
    ],
    'admin/product/delete/([1-9]+)' => [
        'controller' => 'adminProduct',
        'action' => 'delete',
    ],

];