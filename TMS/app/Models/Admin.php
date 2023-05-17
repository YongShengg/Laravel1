<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
    ];

    public static $rules = [
        'name' => 'regex:/^[a-zA-Z\' -]+$/',
        'phone' => 'numeric|max:999999999999999'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
