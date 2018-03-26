<?php

namespace App\Repositories;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageRepository
{
    public function saveImage($image, $id, $type, $import, $w, $h = null, $x = null, $y = null)
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();

            if($import == true) {
                $fileName = $id .'.' . $extension;
            } else {
                $fileName = time() . random_int(100, 999) .'.' . $extension;
            }

            if ($type == 'gallery') {
                $destinationPath = public_path('images/products/'.$id.'/gallery/');
                $url = env('APP_URL') . '/images/products/'.$id.'/gallery/'.$fileName;
            } else {
                $destinationPath = public_path('images/'.$type.'/'.$id.'/');
                $url = env('APP_URL') . '/images/'.$type.'/'.$id.'/'.$fileName;
            }

            $fullPath = $destinationPath.$fileName;

            if (!file_exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0775);
            }

            $image = Image::make($file);

            if($type == 'banners'){
                $image->crop($w, $h, $x, $y);
            }else{
                $image->resize($w, null, function ($constraint) { $constraint->aspectRatio(); });
            }

            $image->encode('jpg');

            $image->save($fullPath, 100);

            return $url;

        } else {
            return env('APP_URL') . '/images/' . $type . '/placeholder300x300.jpg';
        }
    }

    public function base64toImage($image64, $type)
    {
        ini_set("memory_limit","256M");

        $fileDecode = base64_decode($image64);
        $fileName   = time() . random_int(100, 999) . '.jpg';

        $destinationPath = public_path('images/'. $type . '/' . $fileName);

        Image::make($fileDecode)
            ->save($destinationPath, 100);

        return env('APP_URL') . '/images/' . $type . '/' . $fileName;
    }
}