<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        if(!$request){
            $banners = Banner::all();
            return view('banners.index', compact('banners'));
        }

        $whereType          = $request->type;
        $whereStatus        = $request->status;

        $banners = Banner::where('type', 'like', '%'.$whereType.'%')
            ->where('status', 'like', '%'.$whereStatus.'%')
            ->get();

        return view('banners.index', compact('banners', 'whereStatus', 'whereType'));
    }

    public function show()
    {
        //
    }

    public function status($id){

        $ids = explode(',', $id);
        $names = null;

        foreach ($ids as $id){
            $banner = Banner::find($id);
            $name = $banner->name;
            if($banner->status == 0){
                $banner->update(['status' => 1]);
            }elseif($banner->status == 1){
                $banner->update(['status' => 0]);
            }
            $names .= $name . '; ';
        }

        return back()->with(['message' => 'Advertising ['.$names.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request, ImageRepository $repo)
    {
        $banner = Banner::create($request->except('image'));
        $banner->name   = $request->name;
        $banner->type   = $request->type;
        $banner->status = $request->status;
        $name = $banner->name;

        $banner->path   = $repo->saveImage($request->image, $banner->id, 'banners', null, $request->w, $request->h, $request->x, $request->y);

        $banner->save();

        return redirect()
            ->route('banners.index')
            ->with(['message' => 'Advertising ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $banner = Banner::find($id);

        return view('banners.edit', compact('banner'));
    }

    public function update(Request $request, $id, ImageRepository $repo)
    {
        $banner = Banner::find($id);
        $banner->name   = $request->name;
        $banner->type   = $request->type;
        $banner->status = $request->status;

        if($request->hasFile('image'))
        $banner->path   = $repo->saveImage($request->image, $id, 'banners', null, $request->w, $request->h, $request->x, $request->y);

        $banner->update();

        return redirect()
            ->route('banners.index')
            ->with(['message' => 'Advertising ['.$banner->name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id, Request $request)
    {
        $ids = explode(',', $request->banners);
        $names = null;

        if($id == 0)
        {
            foreach ($ids as $id)
            {
                $banner = Banner::find($id);
                $name = $banner->name;
                $banner->delete();
                $names .= $name . '; ';
            }

        } else {
            $banner = Banner::find($id);
            $names = $banner->name;
            $banner->delete();
        }

        return back()->with(['message' => 'Advertisings ['.$names.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
