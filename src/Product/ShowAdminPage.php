<?php

declare(strict_types=1);

namespace App\Product;

use App\JWT\GenerateSignature;
use App\JWT\ValidateToken;
use App\Support\Request;

final class ShowAdminPage
{
    public function __construct(Request $request)
    {
        if (ValidateToken::validate(new GenerateSignature(), $request->getToken())) {
            echo json_encode([
                'authorization' => 'failed'
            ]);
        }

        echo json_encode([
            'message' => 'user authentificated'
        ]);

    }
}