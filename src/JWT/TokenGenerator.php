<?php

declare(strict_types=1);

namespace App\JWT;

use App\User;

final class TokenGenerator
{
    public static function generate(SignatureGeneratorInterface $generator, User $user): string
    {
        $header = base64_encode(json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256',
        ]));

        $payload = base64_encode(json_encode([
            'iss' => 'phpcomrapadura.org',
            'email' => $user->toEmail(),
            'admin' => $user->toAdmin()
        ]));

        $signature = $generator->generate($header, $payload);

        return sprintf("%s.%s.%s", $header, $payload, $signature);
    }
}