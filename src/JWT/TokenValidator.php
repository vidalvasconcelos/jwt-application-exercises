<?php

declare(strict_types=1);

namespace App\JWT;

final class TokenValidator
{
    public static function validate(SignatureGeneratorInterface $generator, string $token): bool
    {
        $anatomy = explode(".", $token);

        $signatureGenerated = $generator->generate(
            $anatomy[JWTAnatomy::HEADER],
            $anatomy[JWTAnatomy::PAYLOAD]
        );

        return $anatomy[JWTAnatomy::SIGNATURE] === $signatureGenerated;
    }
}