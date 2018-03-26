<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 1)->get();

        return response()->json($banners, 200);
    }

    public function getBannerByType($type)
    {
        $banner = Banner::where(['status' => 1, 'type' => $type])->latest()->first();

        if(!$banner) {
            return response()->json(['message' => 'Banner not found'], 404);
        }

        return response()->json($banner, 200);
    }
}
