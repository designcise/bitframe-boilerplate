<?php

use Psr\Container\ContainerInterface;

return static function (ContainerInterface $container) {
    $container['server'] = [
        'env' => 'dev',
    ];

    $container['settings'] = [
        'title' => 'BitFrame PHP',
    ];
};
