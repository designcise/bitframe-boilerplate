<?php

use Psr\Container\ContainerInterface;

error_reporting(E_ALL & ~E_USER_DEPRECATED & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
date_default_timezone_set('UTC');

return static function (ContainerInterface $container) {
    $container['server'] = [
        'env' => 'dev',
    ];

    $container['globals'] = [
        'title' => 'BitFrame PHP',
    ];

    $container['error_handler_settings'] = [
        'addTraceToOutput' => $container['server']['env'] === 'dev',
    ];
};
