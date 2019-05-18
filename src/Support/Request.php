<?php

declare(strict_types=1);

namespace App\Support;

final class Request
{
    public function getToken(): string
    {
        return explode(" ", filter_input(INPUT_SERVER, 'HTTP_AUTHORIZATION'))[1];
    }
}