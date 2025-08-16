<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['phone', 'residence_number', 'email', 'password', 'gender', 'date_of_birth'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        // Example: only allow users with the 'admin' role
        //return $this->hasRole('admin');
        
        // Or just return true to allow all users
        return true;
    }

    public function getFilamentName(): string
    {
        return "{$this->admin->name}";
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function ($user) {
    //         $user->userables()->create([
    //            'user_type_id' => '2',
    //            'userable_type' => User::class,
    //            'userable_id' => $user->id
    //        ]);
    //     });
    // }

    //Relations
    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }
    public function user_bank_accounts(): HasMany
    {
        return $this->hasMany(UserBankAccount::class);
    }
}
