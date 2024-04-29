<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AccessoryPartsOrder;

class AccessoryPart extends Model
{
    use HasFactory;
    protected $table = "accessory_parts";

    protected $fillable = [
        'id',
        'name',
        'brand',
        'description',
        'material',
        'price',
        'feature',
        'availability_colors'
    ];


    protected $primarykey = "id";
    public $timestamps = true;


    public function AccessoryPartsOrder()
    {
        return $this->belongsTo(AccessoryPartsOrder::class);
    }
}
