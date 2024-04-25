<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoryPart extends Model
{
    use HasFactory;
    protected $table = "accessory_parts";

protected $fillable =['id','name','brand','description','material','price','feature','availability_colors'];


    protected $primarykey= "id";
public $timestamps = true;
}
