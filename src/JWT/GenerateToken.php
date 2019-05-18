<?php

declare(strict_types=1);

namespace App\JWT;

use App\Auth\User;

final class GenerateToken
{
    public static function generate(GenerateSignatureInterface $generator, User $user)
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

        echo json_encode([
            'token' => sprintf("%s.%s.%s", $header, $payload, $signature)
        ]);
    }
}