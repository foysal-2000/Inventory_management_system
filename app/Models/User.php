<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
 

    const admin = 'Admin';
    const manager = 'Manager';
    const warehouse_operator = 'Warehouse Operator';
    const cashier = 'Cashier';
    
    protected $guarded=[];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication passed...
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials']);
    }
}
