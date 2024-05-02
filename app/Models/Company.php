<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\InternalMaintenance;
use App\Models\ExternalMaintenance;
use App\Models\SparePart;

class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable =['id','name','capacity','address','cost','quality','founding','pricing'];
        protected $primarykey= "id";
    public $timestamps = true;

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function externalMaintenances()
    {
        return $this->hasMany(ExternalMaintenance::class);
    }

    public function internalMaintenances()
    {
        return $this->hasMany(InternalMaintenance::class);
    }

    public function spareParts()
    {
        return $this->hasMany(SparePart::class);
    }
}
