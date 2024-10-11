<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\ResponseFactory;
use App\Services\AccessService\AccessVerifier;

class ViewProductController extends Controller
{
    private $guard;
    private $responseFactory;
    private $AccessVerifier;

    public function __construct(Guard $guard, ResponseFactory $responseFactory, AccessVerifier $AccessVerifier)
    {
        $this->guard = $guard;
        $this->responseFactory = $responseFactory;
        $this->AccessVerifier = $AccessVerifier;
    }

    public function __invoke(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $user = $this->guard->user;

        if (!$user || !$product)
        {
            return $this->responseFactory->json([
                'محصول مورد نظر موجو نیست.'
            ], 404);
        }

        $hasAccess = $this->AccessVerifier->hasAccess($user, $product);
        if ($hasAccess)
        {
            // trow new
        }

        return $this->responseFactory->json([
            'message' => 'hello'
        ]);
        
    }
}
