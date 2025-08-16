<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    //Relations
    public function habit_translation(): HasMany
    {
        return $this->hasMany(HabitTranslation::class);
    }
    public function habit_choices(): HasMany
    {
        return $this->hasMany(HabitChoice::class);
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(Patient::class, 'habit_patient', 'habit_id', 'patient_id')->withPivot('habit_choice_id')->withTimestamps();
    }
}
