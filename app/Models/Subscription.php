<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'expires_at'
    ];

    protected $cast = [
        'is_active' => 'boolean',
    ];

    public function subscriptions():HasMany
    {
        return $this->HasMany(Subscription::class);
    }

    public static function findByUserAndProduct(User $user, Product $product)
    {
        return self::query()->where('user_id', $user->id)->where('product_id', $product->id)
        ->first();
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function isDeactive() :bool
    {
        return !$this->is_active;
    }

    public function isExpired() :bool
    {
        return Carbon::now()->gt($this->expires_at);
    }
}
