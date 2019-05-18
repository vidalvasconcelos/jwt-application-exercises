<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

(function () {
    $request = new \App\Support\Request();
    $userRequest = new \App\Support\AuthRequest();

    if ($_SERVER['REQUEST_URI'] === '/auth') {
        return new \App\Auth\AuthenticateUser($userRequest);
    }

    if ($_SERVER['REQUEST_URI'] === '/admin') {
        return new \App\Product\ShowAdminPage($request);
    }

    return new \App\Support\ShowHomePage();
})();
