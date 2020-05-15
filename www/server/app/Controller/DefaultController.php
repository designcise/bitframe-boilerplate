<?php

declare(strict_types=1);

namespace YourProject\App\Controller;

use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;
use BitFrame\Container;

class DefaultController
{
    public function testAction(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler,
        Container $container
    ): ResponseInterface {
        $response = $handler->handle($request);
        $globals = $container['globals'];

        $response->getBody()->write(
            "{$globals['title']} - 👋 Build Something Amazing Today!"
        );

        return $response;
    }
}
