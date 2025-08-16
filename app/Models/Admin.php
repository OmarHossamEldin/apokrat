<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'user_id', 'status'];

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function banks(): HasMany
    {
        return $this->hasMany(Bank::class);
    }
    public function bank_accounts(): HasMany
    {
        return $this->hasMany(BankAccount::class);
    }
    public function insurances(): HasMany
    {
        return $this->hasMany(Insurance::class);
    }
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
    public function allergies(): HasMany
    {
        return $this->hasMany(Allergy::class);
    }
    public function chronic_diseases(): HasMany
    {
        return $this->hasMany(ChronicDisease::class);
    }
    public function injuries(): HasMany
    {
        return $this->hasMany(Injury::class);
    }
    public function surgeries(): HasMany
    {
        return $this->hasMany(Surgery::class);
    }
    public function habits(): HasMany
    {
        return $this->hasMany(Habit::class);
    }
    public function habit_choices(): HasMany
    {
        return $this->hasMany(HabitChoice::class);
    }
    public function health_goals(): HasMany
    {
        return $this->hasMany(HealthGoal::class);
    }
    public function Faqs(): HasMany
    {
        return $this->hasMany(Faq::class);
    }
    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }
}
