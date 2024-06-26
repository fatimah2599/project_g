<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class ExternalMaintenance extends Model
{
    use HasFactory;
    protected $table = "external_maintenances";
    protected $fillable =['id','company_id','user_id','order_id','location','status'];
    protected $primarykey= "id";
    public $timestamps = true;

    public function company()
    {
     return $this->belongsTo(Company::class,'company_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
}
