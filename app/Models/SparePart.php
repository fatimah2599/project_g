<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spare_part extends Model
{
    use HasFactory;
    protected $table = "spare_parts";
    protected $fillable =['id','company_id','name','made','model','piece_number','price'];
    protected $primarykey= "id";
    public $timestamps = true;
}
