<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccessoryPartsOrder;
use App\Models\OrdersSparePart;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable =['id','user_id','total_price','date'];
    protected $primarykey= "id";
    public $timestamps = true;

    public function AccessoryPartsOrder()
    {
        return $this->hasMany(AccessoryPartsOrder::class);
    }

    
    public function OrdersSparePart()
    {
        return $this->hasMany(OrdersSparePart::class);
    }
}
