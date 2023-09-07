<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieCategoryModel extends Model
{
    use HasFactory;

    protected $table = 'movie_category';

    public $timestamps = false;

    protected $fillable = [
        'movie_id',
        'category_id'
    ];
}
