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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 5)->unique()->nullable();
            $table->string('role_name')->default('new'); // Default role is 'new' for all users
            $table->string('name')->nullable();;
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();;
            $table->string('confirm')->nullable();;
    
            $table->string('employee_photo')->default('Not Given');
            $table->string('father_name')->default('Not Given');
            $table->string('mother_name')->default('Not Given');
            $table->string('phone')->default('Not Given');
            $table->string('present_address')->default('Not Given');
            $table->string('parmanent_address')->default('Not Given');
            $table->string('gardian_phone')->default('Not Given');
            $table->string('gardian_email')->default('Not Given');
            $table->string('emergency_contact_number')->default('Not Given');
    
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    
        // After creating the table, update the role of the first user to 'admin'
        DB::table('users')->insert([
            'employee_id'=>'1234',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin1234',
            'password' => Hash::make('admin1234'),
            'role_name' => 'Admin', // Assign 'admin' role to the first user
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
