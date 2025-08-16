<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['balance', 'user_id', 'last_transaction_at', 'active'];

    //Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
