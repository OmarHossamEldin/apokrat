<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'blood_type', 'height', 'weight', 'residence_type', 'insurance_number', 'insurance_id', 'parent_id', 'user_id', 'status'];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function insurance(): BelongsTo
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }
    public function chronic_diseases(): BelongsToMany
    {
        return $this->belongsToMany(ChronicDisease::class, 'chronic_patient', 'patient_id', 'chronic_disease_id')->withTimestamps();
    }
    public function injuries(): BelongsToMany
    {
        return $this->belongsToMany(Injury::class, 'injury_patient', 'patient_id', 'injury_id')->withTimestamps();
    }
    public function surgeries(): BelongsToMany
    {
        return $this->belongsToMany(Surgery::class, 'surgery_patient', 'patient_id', 'surgery_id')->withTimestamps();
    }
    public function allergies(): BelongsToMany
    {
        return $this->belongsToMany(Allergy::class, 'allergy_patient', 'patient_id', 'allergy_id')->withTimestamps();
    }
    public function habits(): BelongsToMany
    {
        return $this->belongsToMany(Habit::class, 'habit_patient', 'patient_id', 'habit_id')->withPivot('habit_choice_id')->withTimestamps();
    }
    public function habitpatients(): HasMany
    {
        return $this->hasMany(HabitPatient::class);
    }
    public function health_goals(): BelongsToMany
    {
        return $this->belongsToMany(HealthGoal::class, 'health_goal_patient', 'patient_id', 'health_goal_id')->withTimestamps();
    }
}
