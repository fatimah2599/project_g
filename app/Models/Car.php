<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sale;
use App\Models\Reservation;
use App\Models\Company;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";

    protected $fillable = [
        'id',
        'name',
        'brand',
        'color',
        'engine_type',
        'price',
        'engine_size',
        'car_transmission',
        'model',
        'propulsion_type',
        'production_year',
        'amount',
        'status',
        'number_of_rented',
        'company_id',
        'fuel_tank_capacity',
        'millage',
        'date'
    ];


    protected $primarykey = "id";
    public $timestamps = true;

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
