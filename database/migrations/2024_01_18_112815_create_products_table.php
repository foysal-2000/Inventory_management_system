<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode');
            $table->string('product_name');
            $table->string('category_name')->nullable();
            $table->string('purchase_price');
            $table->string('selling_price');
            $table->string('company_name')->nullable();
            $table->string('discount_in_taka')->nullable();
            $table->string('discount_percentage')->nullable();
            $table->string('supplier_name');
            $table->string('vat_percentage')->nullable();
            $table->string('vat_taka')->nullable();
            $table->string('discount_taka')->nullable();
            $table->string('discount_selling_price')->nullable();
            $table->string('quantity');
            $table->string('profit')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
