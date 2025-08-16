<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ChronicDiseaseTranslation extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['name', 'locale', 'chronic_disease_id'];

    //Relations
    public function chronic_disease(): BelongsTo
    {
        return $this->belongsTo(ChronicDisease::class, 'chronic_disease_id');
    }
}
