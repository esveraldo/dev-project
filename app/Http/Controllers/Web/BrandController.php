<?php

namespace App\Http\Controllers\Web;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function show(){

    }

    public function status($id){
        $brand = Brand::find($id);
        $name = $brand->name;
        if($brand->status == 0){
            $brand->update(['status' => 1]);
        }elseif($brand->status == 1){
            $brand->update(['status' => 0]);
        }
        return back()->with(['message' => 'Brand ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function create(){
        return view('brands.create');
    }

    public function store(Request $request){
        $brand = Brand::create($request->all());
        $name = $brand->name;
        return redirect()->route('brands.index')->with(['message' => 'Brand ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, $id){
        $brand = Brand::find($id);
        $brand->update($request->all());
        $name = $brand->name;
        return back()->with(['message' => 'Brand ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id){
        $brand = Brand::find($id);
        $name = $brand->name;
        $brand->delete();
        return back()->with(['message' => 'Brand ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
