<?php

namespace App\Models\Wallet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WalletOperation extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance_id',
        'value',
        'description',
    ];

    public function balance(): BelongsTo
    {
        return $this->belongsTo(WalletBalance::class, 'balance_id');
    }
}
