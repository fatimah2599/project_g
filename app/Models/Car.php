<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";

    protected $fillable =['id','name','brand','count','enginType','price','engineSize','carTransmission','model','propulsionType','productionYear','amount','status','numberOfRented','company_id','fuelTankCapacity','millage','date'];


        protected $primarykey= "id";
    public $timestamps = true;
    }
