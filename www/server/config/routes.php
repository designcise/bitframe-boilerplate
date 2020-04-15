<?php

use BitFrame\Router\AbstractRouter;
use YourProject\App\Controller\DefaultController;

return static function (AbstractRouter $router) {
    $router->get('/hello/{action}', [DefaultController::class, 'testAction']);
};
