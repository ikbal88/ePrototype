<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table      = 'users';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id','index', 'name', 'email', 'no_ktp', 'telepon', 'alamat', 'password',
        'pin', 'role', 'isactive', 'remember_token', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
