<?php

declare(strict_types=1);

namespace App\Actions;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class NotFound
{
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        return new JsonResponse(['message' => 'not found page'], 404);
    }
}