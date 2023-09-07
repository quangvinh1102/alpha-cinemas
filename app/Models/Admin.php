<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $guarded = 'admin';
    protected $table = 'admin';
    protected $fillable = [
        "fullname",
        "avatar",
        "email",
        "email_verified_at",
        "password",
        "phone",
        "gender",
        "birthday",
        "remember_token",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public $timestamps = true;
}
