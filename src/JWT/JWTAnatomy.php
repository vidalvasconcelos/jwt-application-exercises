<?php

declare(strict_types=1);

namespace App\JWT;

interface JWTAnatomy
{
    public const HEADER = 0;
    public const PAYLOAD = 1;
    public const SIGNATURE = 2;
}