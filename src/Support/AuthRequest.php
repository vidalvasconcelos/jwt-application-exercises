<?php

declare(strict_types=1);

namespace App\Support;

final class AuthRequest
{
    private $attr;

    public function __construct()
    {
        $this->attr = $_POST;
    }

    public function getEmail(): string
    {
        return $this->attr['email'];
    }

    public function getPassword(): string
    {
        return $this->attr['password'];
    }
}