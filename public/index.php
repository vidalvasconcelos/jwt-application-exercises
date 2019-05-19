<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

echo (function () {
    try {

        if ($_SERVER['REQUEST_URI'] === '/auth') {
            return (new \App\Auth\AuthenticateUser)(
                new \App\Support\AuthRequest()
            );
        }

        if ($_SERVER['REQUEST_URI'] === '/admin') {
            return (new \App\Pages\Authenticated())(
                new \App\Support\Request()
            );
        }

        return (new \App\Pages\Home());

    } catch (Exception $e) {
        return json_encode(['error' => $e->getMessage()]);
    }
})();
