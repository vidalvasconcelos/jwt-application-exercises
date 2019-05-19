<?php

declare(strict_types=1);

namespace App\Auth;

use App\JWT\SignatureSha256Generator;
use App\JWT\TokenGenerator;

final class AuthenticateUser
{
    /**
     * @param \App\Auth\AuthRequestInterface $auth
     * @throws \Exception
     * @return string
     */
    public function __invoke(AuthRequestInterface $auth): string
    {
        if (! User::checkCredentials($auth->getEmail(), $auth->getPassword())) {
            throw new \Exception("Credential invalid");
        }

        $token = TokenGenerator::generate(
            new SignatureSha256Generator(),
            new User()
        );

        return json_encode(compact('token'));
    }
}