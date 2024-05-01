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
    protected $fillable =['id','company_id','user_id','order_id','location'];
    protected $primarykey= "id";
    public $timestamps = true;

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
