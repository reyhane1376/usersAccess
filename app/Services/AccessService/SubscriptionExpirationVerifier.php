<?php

namespace app\Services\AccessService;

use app\Service\AccessService\Verifier;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;

class SubscriptionExpirationVerifier extends Verifier 
{
    public function hasAccess(User $user, Product $product): bool
    {
        $subscription = Subscription::findByUserAndProduct($user, $product);

        if ($subscription->isExpired())
        {
            return false;
        }

        return parent::hasAccess($user, $product);
    }
}