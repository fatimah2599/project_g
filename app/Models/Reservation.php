<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;

class Reservation extends Model
{
    use HasFactory;
    protected $table = "reservations";
    protected $fillable =['id','user_id','car_id','period','status','info','type','date','value','cost'];
    protected $primarykey= "id";
    public $timestamps = true;

    public function Car()
    {
        return $this->belongsTo(Car::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
