<?php

declare(strict_types=1);

namespace App\Actions;

use App\JWT\SignatureSha256Generator;
use App\JWT\TokenValidator;
use Exception;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class DisplayOrderList
{
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $token = $request->getHeader('Authorization');

        if (! TokenValidator::validate(new SignatureSha256Generator(), $token[0])) {
            throw new Exception("Token invalid!");
        }

        return new JsonResponse([
            'message' => 'Authenticated'
        ]);
    }
}