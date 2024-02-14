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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('invoiceNo')->nullable();
            $table->string('phone')->nullable();
            $table->string('cashier')->nullable();
            $table->string('subTotal')->nullable();;
            $table->string('vat')->nullable();
            $table->string('discount')->nullable();
            $table->string('payable')->nullable();;
            $table->string('cashReceived')->nullable();
            $table->string('returnAmount')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('selectedBank')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('inventory_id')->constrained('inventories')->onDelete('cascade')->nullable();
            $table->string('invoice_no')->nullable(); 
            $table->string('product_name');
            $table->string('unit_price');
            $table->integer('quantity');
            $table->string('total_price');
            $table->string('phone')->nullable();
            $table->string('invoice_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('profits', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('product_name');
            $table->string('profit');
            $table->string('customer_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profits');
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('inventories');
    }
};
