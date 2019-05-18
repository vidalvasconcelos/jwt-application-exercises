<?php

declare(strict_types=1);

namespace App\JWT;

final class GenerateSignature implements GenerateSignatureInterface
{
    public function generate(string $header, string $payload): string
    {

        return base64_encode(
            hash_hmac('sha256', sprintf("%s.%s", $header, $payload), self::KEY, true)
        );
    }
}