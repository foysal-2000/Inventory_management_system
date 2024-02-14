<?php

namespace App\Models;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable= [
    'barcode',
    'product_name',
    'category_name',
    'selling_price',
    'purchase_price',
    'company_name',
    'discount_taka',
    'discount_percentage',
    'supplier_name',
    'vat_percentage',
    'vat_taka',
    'discount_in_taka',
    'discount_selling_price',
    'quantity',
    'profit'];
}
