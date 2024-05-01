<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrdersSparePart;
use App\Models\Company;

class SparePart extends Model
{
    use HasFactory;
    protected $table = "spare_parts";
    protected $fillable = ['id', 'company_id', 'name', 'made', 'model', 'piece_number', 'price'];
    protected $primarykey = "id";
    public $timestamps = true;

    public function OrdersSparePart()
    {
        return $this->belongsTo(OrdersSparePart::class);
    }

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
