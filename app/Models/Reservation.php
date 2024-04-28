<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = "reservations";
    protected $fillable =['id','user_id','car_id','period','status','info','type','date','value','cost'];
    protected $primarykey= "id";
    public $timestamps = true;
}
