<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalMaintenance extends Model
{
    use HasFactory;
    protected $table = "internal_maintenances";
    protected $primarykey= "id";
    public $timestamps = true;
}
