<?php

declare(strict_types=1);

namespace YourProject\App\Controller;

use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;
use BitFrame\Container;
use BitFrame\FastRoute\Route;

class DefaultController
{
    public function __construct(
        private readonly Container $container,
    ) {}

    #[Route(['GET'], '/hello/{action}')]
    public function testAction(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler,
    ): ResponseInterface {
        $response = $handler->handle($request);
        $globals = $this->container['globals'];

        $response->getBody()->write(
            "{$globals['title']} - 👋 Build Something Amazing Today!"
        );

        return $response;
    }
}
