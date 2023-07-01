<?php

declare(strict_types=1);

namespace YourProject\App\Controller;

use Psr\Http\Message\{ServerRequestInterface, ResponseInterface};
use Psr\Http\Server\RequestHandlerInterface;
use BitFrame\Container;
use BitFrame\FastRoute\Route;
use BitFrame\Http\Message\JsonResponse;

class DefaultController
{
    public function __construct(
        private readonly Container $container,
    ) {}

    #[Route(['GET'], '/hello/{action}')]
    public function indexAction(
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

    #[Route(['GET'], '/json')]
    public function jsonAction(): ResponseInterface
    {
        $globals = $this->container['globals'];

        return JsonResponse::create([
            'data' => [
                'title' => $globals['title'],
                'mainHeading' => 'Build Something Amazing Today!',
            ],
        ]);
    }
}
