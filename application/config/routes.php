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
    'userProfile' => [
        'controller' => 'userProfile',
        'action' => 'index',
    ],
    'contact' => [
        'controller' => 'contact',
        'action' => 'index',
    ],
    'about' => [
        'controller' => 'about',
        'action' => 'index',
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
    'category/([0-9]+)' => [
        'controller' => 'category',
        'action' => 'index',
    ],

    'category/([0-9]+)/([0-9]+)' => [
        'controller' => 'category',
        'action' => 'index',
    ],

    'product' => [
        'controller' => 'product',
        'action' => 'index',
    ],
    'product/([0-9]+)' => [
        'controller' => 'product',
        'action' => 'index',
    ],
    'product/details/([0-9]+)' => [
        'controller' => 'product',
        'action' => 'details',
    ],
    'cart' => [
        'controller' => 'cart',
        'action' => 'index',
    ],
    'cart/add/([0-9]+)' => [
        'controller' => 'cart',
        'action' => 'add',
    ],

    'cart/delete/([0-9]+)' => [
        'controller' => 'cart',
        'action' => 'delete',
    ],
    'cart/order/([0-9]+)' => [
        'controller' => 'cart',
        'action' => 'order',
    ],
    'userProfile/shippedOrders' => [
        'controller' => 'userProfile',
        'action' => 'shippedOrders',
    ],

//    admin routes

    'admin' => [
        'controller' => 'admin',
        'action' => 'index',
    ],

    'admin/search' => [
        'controller' => 'admin',
        'action' => 'search',
    ],

    'admin/order/([0-9]+)' => [
        'controller' => 'adminOrder',
        'action' => 'index',
    ],
    'admin/order' => [
        'controller' => 'adminOrder',
        'action' => 'index',
    ],

    'admin/order/delete/([0-9]+)' => [
        'controller' => 'adminOrder',
        'action' => 'delete',
    ],

    'admin/order/updateStatus/([0-9]+)' => [
        'controller' => 'adminOrder',
        'action' => 'updateStatus',
    ],

    'admin/category' => [
        'controller' => 'adminCategory',
        'action' => 'index',
    ],

    'admin/category/([0-9]+)' => [
        'controller' => 'adminCategory',
        'action' => 'index',
    ],
    'admin/category/create' => [
        'controller' => 'adminCategory',
        'action' => 'create',
    ],
    'admin/category/update/([0-9]+)' => [
        'controller' => 'adminCategory',
        'action' => 'update',
    ],
    'admin/category/delete/([0-9]+)' => [
        'controller' => 'adminCategory',
        'action' => 'delete',
    ],

    'admin/product' => [
        'controller' => 'adminProduct',
        'action' => 'index',
    ],

    'admin/product/([0-9]+)' => [
        'controller' => 'adminProduct',
        'action' => 'index',
    ],
    'admin/product/create' => [
        'controller' => 'adminProduct',
        'action' => 'create',
    ],
    'admin/product/update/([0-9]+)' => [
        'controller' => 'adminProduct',
        'action' => 'update',
    ],
    'admin/product/delete/([0-9]+)' => [
        'controller' => 'adminProduct',
        'action' => 'delete',
    ],

];