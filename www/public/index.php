<?php

require_once __DIR__ . '/../vendor/autoload.php';

use BitFrame\App;
use YourProject\App\Server;

use function YourProject\Helper\import;

(static function () {
    $app = new App();
    $container = $app->getContainer();

    import(Server::CONFIG_DIR . 'settings', [$container]);
    import(Server::CONFIG_DIR . 'services', [$container]);
    import(Server::ROUTES_DIR . 'routes', [$container['router']]);

    $app->use([
        $container['emitter'],
        $container['errorHandler'],
        $container['router'],
    ]);

    $app->run();
})();
