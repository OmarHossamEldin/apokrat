<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ChronicDisease extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    //Relations
    public function chronic_disease_translation(): HasMany
    {
        return $this->hasMany(ChronicDiseaseTranslation::class);
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'chronic_patient', 'chronic_disease_id', 'patient_id')->withTimestamps();
    }
}
