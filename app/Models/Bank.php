<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name'];
    protected $fillable = ['image', 'admin_id'];

    //Relations
    public function bank_translation(): HasMany
    {
        return $this->hasMany(BankTranslation::class);
    }
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function bank_accounts(): HasMany
    {
        return $this->hasMany(BankAccount::class);
    }
    public function user_bank_accounts(): HasMany
    {
        return $this->hasMany(UserBankAccount::class);
    }
}
