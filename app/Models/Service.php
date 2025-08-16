<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name', 'description'];
    protected $fillable = ['image', 'min_price', 'parent_id', 'admin_id'];

    //Relations
    public function service_translation(): HasMany
    {
        return $this->hasMany(ServiceTranslation::class);
    }
    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, 'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(static::class, 'parent_id');
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function hsps(): BelongsToMany
    {
        return $this->belongsToMany(Hsp::class, 'hsp_service', 'hsp_id', 'service_id')->withPivot('price')->withTimestamps();
    }
}
