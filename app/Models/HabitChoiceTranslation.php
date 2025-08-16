<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class HabitChoiceTranslation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'locale', 'habit_choice_id'];

    //Relations
    public function habit_choice(): BelongsTo
    {
        return $this->belongsTo(HabitChoice::class, 'habit_choice_id');
    }
}
