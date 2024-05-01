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

    public function AccessoryPartsOrder()
    {
        return $this->hasMany(AccessoryPartsOrder::class);
    }

    
    public function OrdersSparePart()
    {
        return $this->hasMany(OrdersSparePart::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function ExternalMaintenance()
    {
        return $this->hasMany(ExternalMaintenance::class);
    }

    public function InternalMaintenance()
    {
        return $this->hasMany(InternalMaintenance::class);
    }
}
