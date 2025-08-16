<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Hsp extends Model
{
    use HasFactory, SoftDeletes, Translatable;

    public $translatedAttributes = ['name', 'tagline', 'about'];
    protected $fillable = ['website', 'logo', 'lat', 'long', 'status', 'user_id'];

    // Relations
    public function hsp_translation(): HasMany
    {
        return $this->hasMany(HspTranslation::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function specielist_info(): HasOne
    {
        return $this->HasOne(SpecialistInfo::class);
    }
    public function hsp_gallary(): HasMany
    {
        return $this->hasMany(HspGallary::class);
    }
    public function hsp_phone_numbers(): HasMany
    {
        return $this->hasMany(HspPhoneNumber::class);
    }
    public function work_schedules(): HasMany
    {
        return $this->hasMany(WorkSchedule::class);
    }
    public function activity_types(): BelongsToMany
    {
        return $this->belongsToMany(ActivityType::class, 'hsp_types', 'hsp_id', 'activity_type_id')->withTimestamps();
    }
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'hsp_service', 'hsp_id', 'service_id')->withPivot('price')->withTimestamps();
    }
}
