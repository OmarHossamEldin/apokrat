<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class InsuranceTranslation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'locale', 'insurance_id'];

    //Relations
    public function insurance(): BelongsTo
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }
}
