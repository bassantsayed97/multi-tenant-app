<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\File;
trait UploadFile
{
    public function upload($file,$dir='')
    {
        $image_name      = time();
        $ext             = strtolower($file->getClientOriginalExtension());
        $image_full_name = $image_name.'.'.$ext;
        $upload_path     = $dir ?? '';
        $image_url       = $upload_path.'/'.$image_full_name;
        $file->move(public_path('uploads').'/'.$upload_path,$image_full_name);
        return $image_url;
    }






}


