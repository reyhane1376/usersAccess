<?php

namespace App\Services\AccessService;
use app\Service\AccessService\Verifier;
use App\Models\User;
use App\Models\Product;


class AccessVerifier
{

    public function hasAccess(User $user, Product $product) :bool
    {
        return $this->buildAccessChain()->hasAccess($user, $product);
    }

    private function buildAccessChain() :Verifier
    {
        $subscriptionExpiration  = new SubscriptionExpirationVerifier();
        $subescriptionActivation = new ActivationVerifier($subscriptionExpiration);
        $subescription           = new SubscriptionVerifier($subescriptionActivation);

        return new UserActivationVerifier($subescription);
    }
}