<?php

use Psr\Container\ContainerInterface;
use BitFrame\FastRoute\Router;
use BitFrame\Emitter\SapiEmitter;

return static function (ContainerInterface $container) {
    $container['router'] = static fn() => new Router();
    $container['emitter'] = static fn() => new SapiEmitter();
};
