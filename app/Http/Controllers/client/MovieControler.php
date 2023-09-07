<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MovieControler extends Controller
{
    public function index() {
        $listMovie = Movie::get();
        foreach ($listMovie as $item) {
            $item['img'] = asset(Storage::url($item->img));
            $item['categories'] = $item->categories->toArray();
            $item['schedules'] = $item->schedules->toArray();
            // dd($item->toArray());
        }
        // dd($item->toArray(),$item->categories->toArray());
        // dd($listMovie->toArray());
        return response()->json(['listMovie' => $listMovie]);
    }
    public function movieBySlug($slug){
        $movie = Movie::where('slug','=',$slug)->first();
        $movie->img = asset(Storage::url($movie->img));
        $movie['categories'] = $movie->categories;
        $movie['schedules'] = $movie->schedules;
        foreach ($movie['schedules'] as $value) {
            $movie['schedules'] = $value->room;
        }
        return response()->json($movie);
    }
}
