<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use PhpParser\Node\Scalar\String_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadImage($image, $dir = 'images')
    {
        $uploadImage = $image;
        $imageName = time() . '.' . $uploadImage->getClientOriginalExtension();
        $direction = public_path('images/' . $dir . '/');
        $uploadImage->move($direction, $imageName);
        $imagePath = $dir.'/'. $imageName;
        return $imagePath;
    }

}