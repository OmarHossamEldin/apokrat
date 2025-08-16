<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class HspPhoneNumber extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    // Relations
    public function hsp(): BelongsTo
    {
        return $this->belongsTo(Hsp::class, 'hsp_id');
    }
}
