<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Group;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\BarcodeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ImageRepository;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        $groups = Group::all();

        return view('products.index', compact('products', 'brands', 'groups'));
    }

    public function show()
    {
        //
    }

    public function create()
    {
        $brands = Brand::all();
        $groups = Group::all();
        $tags = Tag::all();

        return view('products.create', compact('brands', 'groups', 'tags'));
    }

    public function store(Request $request, ImageRepository $repo, BarcodeRepository $repoBarcode)
    {
        $product = Product::create($request->except('primaryImage'));

        $product->tags()->sync($request->tag_id);
        $product->groups()->sync($request->group_id);

        if ($request->hasFile('primaryImage')) {
            $product->path_image = $repo->saveImage($request->primaryImage, $product->id, 'products', null, 300);
        }

        if ($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');

            foreach ($gallery as $image) {
                $galleryItem = new Image(['path' => $repo->saveImage($image, $product->id, 'gallery', null, 300)]);
                $product->images()->save($galleryItem);
            }

            if($product->images()->count() < 9){
                $galleryItem = new Image(['path' => $repo->saveImage($image, $product->id, 'gallery', null, 300)]);
                $product->images()->save($galleryItem);
            }
        }

        $imageBase64 = $repoBarcode->generate($request->barcode, 'EAN13');
        $pathImage   = $repo->base64toImage($imageBase64, 'barcodes');
        $product->barcode_path_image = $pathImage;

        $product->save();

        return redirect()->route('products.index')->with(['message' => 'Product ['.$product->name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $brands = Brand::all();
        $groups = Group::all();
        $tags = Tag::all();

        return view('products.edit', compact('product', 'brands', 'groups', 'tags'));
    }

    public function update(Request $request, ImageRepository $repo, $id)
    {
        $product = Product::find($id);

        $product->update($request->except('primaryImage'));
        $product->tags()->sync($request->tag_id);
        $product->groups()->sync($request->group_id);

        $name = $product->name;

        if ($request->hasFile('primaryImage')) {
            $product->path_image = $repo->saveImage($request->primaryImage, $product->id, 'products', null, 300);
        }

        if ($request->hasFile('gallery')) {
            $gallery = $request->file('gallery');
            foreach ($gallery as $image) {
                if($product->images()->count() < 9){
                    $galleryItem = new Image(['path' => $repo->saveImage($image, $product->id, 'gallery', null, 300)]);
                    $product->images()->save($galleryItem);
                }

            }
        }

        $product->save();

        return back()->with(['message' => 'Product ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $name = $product->name;
        $product->delete();

        return back()->with(['message' => 'Product ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }

    public function imageDestroy($product_id, $image_id)
    {
        $image = Image::find($image_id);
        $image->delete();

        return back()->with(['message' => 'Image successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }

    public function share($id){
        $product = Product::find($id);
        return view('products.shared', compact('product'));
    }
}
