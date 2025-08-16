<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SurgeryTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'locale', 'surgery_id'];

    //Relations
    public function surgery(): BelongsTo
    {
        return $this->belongsTo(Surgery::class, 'surgery_id');
    }
}
