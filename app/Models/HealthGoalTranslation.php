<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class HealthGoalTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'locale', 'health_goal_id'];

    //Relations
    public function health_goal(): BelongsTo
    {
        return $this->belongsTo(HealthGoal::class, 'health_goal_id');
    }
}
