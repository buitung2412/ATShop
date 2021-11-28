<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends  Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'account';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
        'remember_token'
    ];

   
}
