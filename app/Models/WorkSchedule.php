<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class WorkSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['work_date', 'time_from', 'time_to', 'status', 'hsp_id'];
    
    //Relations
    public function hsp(): BelongsTo
    {
        return $this->belongsTo(Hsp::class, 'hsp_id');
    }
}
