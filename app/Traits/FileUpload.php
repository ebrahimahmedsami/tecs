<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function uploadFile($file,$path){
        $fileName = time().'.'.$file->extension();
        Storage::disk('local')->put('public/'.$path.'/'.$fileName,file_get_contents($file));
        return $fileName;
    }

    public function deleteFile($path){
        if (Storage::exists($path)){
            return Storage::delete($path);
        }
        return false;
    }
}
