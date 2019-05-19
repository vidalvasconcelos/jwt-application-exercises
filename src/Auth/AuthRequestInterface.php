<?php

declare(strict_types=1);

namespace App\Auth;

interface AuthRequestInterface
{
    public function getEmail(): string;

    public function getPassword(): string;
}