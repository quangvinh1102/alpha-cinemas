<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';
    protected $fillable = [
        'movie_id',
        'room_id',
        'date',
        'time'
    ];

    public $timestamps = false;

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
