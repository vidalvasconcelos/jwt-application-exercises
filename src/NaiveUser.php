<?php

declare(strict_types=1);

namespace App;

final class NaiveUser implements User
{
    public function toEmail(): string
    {
        return self::EMAIL;
    }

    public function toAdmin(): bool
    {
        return self::ADMIN;
    }

    public static function checkCredentials(string $email, string $password): bool
    {
        return $email === self::EMAIL
            && $password === self::PASSWORD;
    }
}