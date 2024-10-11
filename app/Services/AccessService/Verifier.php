<?php

namespace app\Service\AccessService;

use App\Models\User;
use App\Models\Product;


abstract class Verifier 
{
    private Verifier $nextVerifier;

    public function __constract(Verifier $nextVerifier = null)
    {
        $this->nextVerifier = $nextVerifier;
    }

    public function hasAccess(User $user, Product $product):bool
    {
        if (!$this->nextVerifier)
        {
            return true;
        }

        return $this->nextVerifier->hasAccess($user, $product);
    }

    
}