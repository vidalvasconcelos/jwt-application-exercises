<?php

declare(strict_types=1);

namespace App\Auth;

use App\JWT\GenerateSignature;
use App\JWT\GenerateToken;
use App\Support\AuthRequest;

final class AuthenticateUser
{
    public function __construct(AuthRequest $auth)
    {
        if (! User::checkCredentials($auth->getEmail(), $auth->getPassword())) {
            echo json_encode([
                'authorization' => 'failed'
            ]);
            return;
        }

        GenerateToken::generate(
            new GenerateSignature(),
            new User()
        );
    }
}