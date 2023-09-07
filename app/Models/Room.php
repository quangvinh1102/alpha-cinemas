<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    
    use HasFactory;
    protected $table = 'rooms';

    protected $fillable = [
        "name",
        "address",
    ];

    public $timestamps = false;

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }
}
