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

    public function accessoryParts()
    {
        return $this->belongsTo(AccessoryPart::class,'accessory_part_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
