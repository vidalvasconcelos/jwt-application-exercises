<?php

declare(strict_types=1);

namespace App\JWT;

final class SignatureSha256Generator implements SignatureGeneratorInterface
{
    /**
     * @param string $header
     * @param string $payload
     * @return string
     */
    public function generate(string $header, string $payload): string
    {
        return base64_encode(
            hash_hmac('sha256', sprintf("%s.%s", $header, $payload), self::KEY, true)
        );
    }
}