<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HspTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'tagline', 'about', 'locale', 'hsp_id'];

    //Relations
    public function hsp(): BelongsTo
    {
        return $this->belongsTo(Hsp::class, 'hsp_id');
    }
}
