<?php

declare(strict_types=1);

namespace App\JWT;

final class ValidateToken
{
    private const HEADER = 0;
    private const PAYLOAD = 1;
    private const SIGNATURE = 1;

    public static function validate(GenerateSignatureInterface $generator, string $token)
    {
        $anatomy = explode(".", $token);
        $signature = $generator->generate($anatomy[self::HEADER], $anatomy[self::PAYLOAD]);

        return $anatomy[self::SIGNATURE] === $signature;
    }
}