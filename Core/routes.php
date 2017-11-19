<?php

return [
    '/' => [
        'controller' => App\Controllers\MainController::class,
        'action' => 'main'
    ],
    '/get_list' => [
        'controller' => App\Controllers\ApiController::class,
        'action' => 'getList'
    ],
    '/add' => [
        'controller' => App\Controllers\ApiController::class,
        'action' => 'add'
    ],
    '/delete' => [
        'controller' => App\Controllers\ApiController::class,
        'action' => 'delete'
    ],
    '/update' => [
        'controller' => App\Controllers\ApiController::class,
        'action' => 'update'
    ],
];