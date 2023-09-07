<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\FileService;
use App\Models\Category;
use App\Models\Movie;
use App\Models\MovieCategoryModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    protected $file;
    public function __construct(FileService $file)
    {
        $this->file = $file;
    }

    public function index()
    {
        $listMovie = Movie::get();
        foreach ($listMovie as $item) {
            $item['img'] = asset(Storage::url($item->img));
        }
        return response()->json($listMovie);
    }

    public function create()
    {
        $listCategories = Category::get();
        return response()->json($listCategories);
    }
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $path = $this->file->uploadImage($request->file, 'movies');
        }
        try {
            $create = Movie::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'img' => $path,
                'descrition' => $request->descrition,
                'release_date' => Carbon::parse($request->release_date)->format('Y/m/d'),
                'director' => $request->director,
                'running_time' => $request->running_time,
            ]);

            if (!empty($request->categories)) {
                foreach (json_decode($request->categories) as $value) {
                    MovieCategoryModel::create([
                        'movie_id' => $create->id,
                        'category_id' => $value
                    ]);
                }
            }


            return response()->json(['mess' => 'Thêm phim mới thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function edit($id)
    {
        $movie = Movie::find($id);
        $movie->img = asset(Storage::url($movie->img));
        $movie['categories'] = $movie->categories;
        return response()->json($movie);
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::find($id);
        if($request->hasFile('file')){
            if(Storage::exists($movie->img)){
                Storage::delete($movie->img);
            }
            $path = $this->file->uploadImage($request->file, 'movies');
        }else{
            $path = $movie->img;
        }
        $arrCategories = $movie->categories->toArray();
        foreach ($arrCategories as $item) {
            $old_categories[] = $item['pivot']['category_id'];
        }
        $new_categories = json_decode($request->categories);
        // dd($new_categories);

        try {
            $movie->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'img' => $path,
                'descrition' => $request->descrition,
                'release_date' => Carbon::parse($request->release_date)->format('Y/m/d'),
                'director' => $request->director,
                'running_time' => $request->running_time,
            ]);

            //update category
            // dd($old_categories, $new_categories);
            foreach ($new_categories as $value) {
                if (!is_object($value)) {
                    if (!empty($new_categories)) {
                        $delete = array_diff($old_categories, $new_categories);
                        $add = array_diff($new_categories, $old_categories);
                        if (!empty($delete)) {
                            foreach ($delete as $value) {
                                foreach ($movie->categories as $item) {
                                    if ($item->pivot->category_id == $value) {
                                        $item->pivot->delete();
                                    }
                                }
                            }
                        }
                        if (!empty($add)) {
                            foreach ($add as $value) {
                                MovieCategoryModel::create([
                                    'movie_id' => $movie->id,
                                    'category_id' => $value
                                ]);
                            }
                        }
                    } else {
                        if (!empty($old_categories)) {
                            foreach ($movie->categories as $item) {
                                $item->delete();
                            }
                        }
                    }
                    break;
                }
            }
            return response()->json(['mess' => 'Cập nhật phim thành công!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function delete($id)
    {
        try {
            $movie = Movie::find($id);
            $movie->delete();
            return response()->json(['mess' => 'Xóa thành công!!']);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}