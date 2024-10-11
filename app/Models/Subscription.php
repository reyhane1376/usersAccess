<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'expires_at'
    ];

    public function subscriptions():HasMany
    {
        return $this->HasMany(Subscription::class);
    }
}
