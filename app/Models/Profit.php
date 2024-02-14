<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use app\Models\Inventory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profit extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function invoice(){
        return $this->belongsTo(Inventory::class,'invoic_id');    
    }
   
}
