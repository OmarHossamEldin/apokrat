<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $guarded = [];

    //Accessor for filament resource
    public function getNameAttribute(): string
    {
        return $this->translateOrNew(app()->getLocale())->name;
    }

    //Relations
    public function activity_type_translation(): HasMany
    {
        return $this->hasMany(ActivityTypeTranslation::class);
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function hsps(): BelongsToMany
    {
        return $this->belongsToMany(Hsp::class, 'hsp_types', 'hsp_id', 'activity_type_id')->withTimestamps();
    }
}
