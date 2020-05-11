<?php

use Psr\Container\ContainerInterface;

return static function (ContainerInterface $container) {
    $container['server'] = [
        'env' => 'dev',
    ];

    $container['settings'] = [
        'title' => 'BitFrame PHP',
    ];

    $container['error_handler_settings'] = [
        'addTraceToOutput' => $container['server']['env'] === 'dev',
    ];
};
