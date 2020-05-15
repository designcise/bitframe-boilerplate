<?php

declare(strict_types=1);

use BitFrame\Container;
use BitFrame\FastRoute\Router;
use BitFrame\Factory\HttpFactory;
use BitFrame\Emitter\SapiEmitter;
use BitFrame\Whoops\ErrorHandler;
use BitFrame\Whoops\Provider\HandlerProviderNegotiator;

return static function (Container $container) {
    $container['router'] = static fn() => new Router();
    $container['emitter'] = static fn() => new SapiEmitter();
    $container['errorHandler'] = static fn () => (
        new ErrorHandler(
            HttpFactory::getFactory(),
            HandlerProviderNegotiator::class,
            $container['error_handler_settings']
        )
    );
};
