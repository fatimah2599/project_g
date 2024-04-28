<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = "companies";
    protected $fillable =['id','name','capacity','address','cost','quality','founding','pricing'];
        protected $primarykey= "id";
    public $timestamps = true;
}
