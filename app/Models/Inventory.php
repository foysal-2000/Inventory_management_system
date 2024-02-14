<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    public function profit() {
        return $this->hasMany(Profit::class,"id");
    }
}
