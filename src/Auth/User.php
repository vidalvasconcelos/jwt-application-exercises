<?php

declare(strict_types=1);

namespace App\Auth;

final class User
{
    private const EMAIL = 'vasconcelosvidal@gmail.com';
    private const PASSWORD = 'rapadurainrussas';
    private const ADMIN = true;

    public static function checkCredentials(string $email, string $password): bool
    {
        return $email === self::EMAIL && $password === self::PASSWORD;
    }

    public function toEmail(): string
    {
        return self::EMAIL;
    }

    public function toAdmin(): bool
    {
        return self::ADMIN;
    }
}