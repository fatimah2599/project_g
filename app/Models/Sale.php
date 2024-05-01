<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\Order;

class Sale extends Model
{
    use HasFactory;
    protected $table = "sales";
    protected $fillable =['id','car_id','order_id','count','type','price'];
    protected $primarykey= "id";
    public $timestamps = true;

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function Car()
    {
        return $this->belongsTo(Car::class);
    }
}
