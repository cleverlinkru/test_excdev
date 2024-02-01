<?php

namespace App\Models\Wallet;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WalletBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'value',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function operations(): HasMany
    {
        return $this->hasMany(WalletOperation::class, 'balance_id');
    }
}
