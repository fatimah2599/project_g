<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersSparePart extends Model
{
    use HasFactory;
    protected $table = "orders_spare_parts";
    protected $primarykey= "id";
    public $timestamps = true;
}
