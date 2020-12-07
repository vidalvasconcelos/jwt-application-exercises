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
    try {
        $path = $request->getUri()->getPath();

        if ('/auth' === $path) {
            return (new Authenticate)($request);
        }

        if ('/admin' === $path) {
            return (new DisplayOrderList())($request);
        }

        return (new Welcome())($request);

    } catch (Exception $e) {
        return new JsonResponse(['error' => $e->getMessage()]);
    }
})($request);

echo $response->getBody()->getContents();


