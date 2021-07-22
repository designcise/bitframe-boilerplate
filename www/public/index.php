<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use BitFrame\App;
use YourProject\App\Server;

use function YourProject\Helper\import;

(static function () {
    $app = new App();

    /** @var \BitFrame\Container $container */
    $container = $app->getContainer();

    import(Server::CONFIG_DIR . 'settings', [$container]);
    import(Server::CONFIG_DIR . 'services', [$container]);
    import(Server::ROUTES_DIR . 'routes', [$container['router'], $container]);

    $app->use([
        $container['emitter'],
        $container['errorHandler'],
        $container['router'],
    ]);

    $app->run();
})();
