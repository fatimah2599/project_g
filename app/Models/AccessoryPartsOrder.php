<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccessoryPart;
use App\Models\Order;

class AccessoryPartsOrder extends Model
{
    use HasFactory;
    protected $table = "accessory_parts_orders";

    protected $fillable = [
        'id',
        'order_id',
        'accessory_part_id',
        'count',
        'price'
    ];


    protected $primarykey = "id";
    public $timestamps = true;

    public function AccessoryPart()
    {
        return $this->hasMany(AccessoryPart::class);
    }

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
}
