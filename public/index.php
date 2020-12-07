<?php

declare(strict_types=1);

use App\Actions\Authenticate;
use App\Actions\DisplayOrderList;
use App\Actions\Welcome;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

require __DIR__.'/../vendor/autoload.php';

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$response = (static function (RequestInterface $request): ResponseInterface {
    switch ($request->getUri()->getPath()) {
        case '/auth':
            return (new Authenticate())($request);
        case '/admin':
            return (new DisplayOrderList())($request);
        case '/':
            return (new Welcome())($request);
        default:
            return new JsonResponse(['message' => 'page not found'], 404);
    }
    })($request);

echo $response->getBody()->getContents();


