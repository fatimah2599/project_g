<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccessoryPartsOrder;
use App\Models\OrdersSparePart;
use App\Models\Sale;
use App\Models\User;
use App\Models\InternalMaintenance;
use App\Models\ExternalMaintenance;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable =['id','user_id','total_price','date'];
    protected $primarykey= "id";
    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function accessoryPartsOrder()
    {
        return $this->hasMany(AccessoryPartsOrder::class);
    }

    
    public function ordersSparePart()
    {
        return $this->hasMany(OrdersSparePart::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function externalMaintenances()
    {
        return $this->hasMany(ExternalMaintenance::class);
    }

    public function internalMaintenances()
    {
        return $this->hasMany(InternalMaintenance::class);
    }
}
