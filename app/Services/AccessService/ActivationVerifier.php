<?php

namespace app\Services\AccessService;

use app\Service\AccessService\Verifier;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;

class ActivationVerifier extends Verifier 
{
    public function hasAccess(User $user, Product $product): bool
    {
        $subscription = Subscription::findByUserAndProduct($user, $product);

        if ($subscription->isDeactive())
        {
            return false;
        }

        return parent::hasAccess($user, $product);
    }
}