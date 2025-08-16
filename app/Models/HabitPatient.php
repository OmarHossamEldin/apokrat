<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class HabitPatient extends Pivot
{
    /*
     * This model created to handling filament repeater in patient form based on filament documentation
    */
    public $incrementing = true;

    //Relations
    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
