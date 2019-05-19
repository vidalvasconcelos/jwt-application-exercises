<?php

declare(strict_types=1);

namespace App\Pages;

use App\JWT\SignatureSha256Generator;
use App\JWT\TokenValidator;
use App\Support\Request;

final class Authenticated
{
    /**
     * @param \App\Support\Request $request
     * @return false|string
     * @throws \Exception
     */
    public function __invoke(Request $request): string
    {
        if (! TokenValidator::validate(new SignatureSha256Generator(), $request->getToken())) {
            throw new \Exception("Token invalid!");
        }

        return json_encode([
            'message' => 'Authenticated'
        ]);
    }
}