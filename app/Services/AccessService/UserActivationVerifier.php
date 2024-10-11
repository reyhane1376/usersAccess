<?php

namespace app\Services\AccessService;

use app\Service\AccessService\Verifier;
use App\Models\User;
use App\Models\Product;

class UserActivationVerifier extends Verifier 
{
    public function hasAccess(User $user, Product $product): bool
    {
        if ($user->isDeactive())
        {
            return false;
        }

        return parent::hasAccess($user, $product);
    }
}