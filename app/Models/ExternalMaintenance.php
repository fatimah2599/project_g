<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalMaintenance extends Model
{
    use HasFactory;
    protected $table = "external_maintenances";
    protected $fillable =['id','company_id','user_id','order_id','location'];
    protected $primarykey= "id";
    public $timestamps = true;
}
