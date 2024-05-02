<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\SparePart;

class OrdersSparePart extends Model
{
    use HasFactory;
    protected $table = "orders_spare_parts";
    protected $fillable =['id','spare_part_id','order_id','count','price'];
    protected $primarykey= "id";
    public $timestamps = true;

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function spareParts()
    {
        return $this->belongsTo(SparePart::class,'spare_part_id');
    }
}
