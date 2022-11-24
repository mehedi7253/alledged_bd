<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImage($image,$path)
    {
        $filename = 'public/'.$path.rand().'_'.time() . '.jpeg' ;
        $filePath = public_path($path);
        if(!File::exists($filePath)){
            File::makeDirectory($filePath, 0777, true, true);
        }
        $image->move($filePath, $filename);
        return $filename;
    }
}
