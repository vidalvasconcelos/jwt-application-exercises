<?php

declare(strict_types=1);

namespace App\Actions;

use App\NaiveUser;
use App\JWT\SignatureSha256Generator;
use App\JWT\TokenGenerator;
use Exception;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class Authenticate
{
    public function __invoke(RequestInterface $request): ResponseInterface
    {
        $payload = json_decode(
            $request->getBody()->getContents(),
            true
        );

        if (! NaiveUser::checkCredentials($payload['email'], $payload['password'])) {
            throw new Exception("Credential invalid");
        }

        $token = TokenGenerator::generate(
            new SignatureSha256Generator(),
            new NaiveUser()
        );

        return new JsonResponse(['token' => $token]);
    }
}