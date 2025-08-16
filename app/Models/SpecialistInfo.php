<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SpecialistInfo extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = ['years_of_experience', 'medical_license', 'specialization_id', 'hsp_id'];

    // Relations
    public function hsp(): BelongsTo
    {
        return $this->belongsTo(Hsp::class, 'hsp_id');
    }
}
