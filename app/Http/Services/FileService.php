<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;

class FileService {

    public function uploadImage($file, $nameFolder){
        $nameFolder = 'public/'.$nameFolder;
        if(!Storage::exists($nameFolder)){
            Storage::makeDirectory($nameFolder);
        }

        $path = Storage::putFile($nameFolder, $file, 'public');
        return $path;
    }
}