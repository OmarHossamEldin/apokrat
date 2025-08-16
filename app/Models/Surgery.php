<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Surgery extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    //Relations
    public function surgery_translation(): HasMany
    {
        return $this->hasMany(SurgeryTranslation::class);
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'surgery_patient', 'surgery_id', 'patient_id')->withTimestamps();
    }
}
