<?php

declare(strict_types=1);

use BitFrame\Container;
use BitFrame\Router\AbstractRouter;
use YourProject\App\Controller\DefaultController;

return static function (AbstractRouter $router, Container $container) {
    $router->get('/hello/{action}', [DefaultController::class, 'testAction', $container]);
};
