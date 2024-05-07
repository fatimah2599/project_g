<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Reservation;
use App\Models\Order;
use App\Models\ExternalMaintenance;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "users";
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'confirm_password',
        'phone',
        'role',
        'car_color',
        'plate_number',
        'car_model',
        'car_brand',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primarykey = "id";
    public $timestamps = true;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function externalMaintenances()
    {
        return $this->hasMany(ExternalMaintenance::class);
    }

    public function internalMaintenances()
    {
        return $this->hasMany(ExternalMaintenance::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
