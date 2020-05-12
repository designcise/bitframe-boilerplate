<?php

namespace YourProject\App\Controller;

use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;

class DefaultController
{
    public function testAction(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface {
        $container = $handler->getContainer();
        $globals = $container['globals'];

        $response = $handler->handle($request);

        $response->getBody()->write(
            "{$globals['title']} - 👋 Build Something Amazing Today!"
        );

        return $response;
    }
}
