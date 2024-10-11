<?php

namespace app\Services\AccessService;

use app\Service\AccessService\Verifier;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;

class SubscriptionVerifier extends Verifier 
{
    public function hasAccess(User $user, Product $product): bool
    {
        $subscription = Subscription::findByUserAndProduct($user, $product);

        if (!$subscription)
        {
            return false;
        }

        return parent::hasAccess($user, $product);
    }
}