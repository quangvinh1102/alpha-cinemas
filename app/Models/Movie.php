<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'movies';
    protected $fillable = [
        'name',
        'slug',
        'img',
        'descrition',
        'release_date',
        'director',
        'running_time',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public $timestaps = true;

    public function categories(){
        return $this->belongsToMany(Category::class, 'movie_category', 'movie_id', 'category_id' );
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
