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
        $settings = $container['settings'];

        $handler->write("{$settings['title']} - 👋 Build Something Amazing Today!");

        return $handler->handle($request);
    }
}
