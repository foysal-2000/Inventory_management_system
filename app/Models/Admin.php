<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;  // Update this line
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Admin extends Authenticatable  // Update this line
{
    use HasFactory, SoftDeletes, Notifiable, HasApiTokens;

    protected $guarded = [];

    // Your model code goes here
}