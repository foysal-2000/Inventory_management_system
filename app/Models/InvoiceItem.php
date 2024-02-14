<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use HasFactory;
    use SoftDeletes;
   // protected $fillable = ['product_name', 'unit_price','quantity', 'total_price','phone'];
protected $guarded = [];
    public function invoice()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function profit()
    {
        return $this->hasMany(Profit::class);
    }
}
