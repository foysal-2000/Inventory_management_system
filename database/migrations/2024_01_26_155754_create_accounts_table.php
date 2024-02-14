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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('designation');
            $table->date('date');
            $table->decimal('start_cash_amount', 10, 2);
            $table->decimal('end_cash_amount', 10, 2);
            $table->decimal('sales_amount', 10, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
