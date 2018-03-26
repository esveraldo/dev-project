<?php

namespace App\Http\Controllers\Web;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Image;
use App\Models\Product;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

class ImportProductController extends Controller
{
    public function index()
    {
        return view('imports.products.index');
    }

    public function store(Request $request, ImageRepository $repo)
    {
        $check = false;

        if ($request->hasFile('images')) {
            $check = true;
            $gallery = $request->file('images');
            foreach ($gallery as $image) {
                //dd($image);
                $galleryItem = new Image(['path' => $repo->saveImage($image, pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), 'products', true, 300)]);
            }
        }

        if ($request->hasFile('file')) {
            $check = true;
 
            Excel::load($request->file, function($reader) {

                $results = $reader->all();

                $column = Product::all()->last()->column == 1 ? $column = 2 : $column = 1;
                
                foreach ($results as $item)
                {
                    
                    //dd($item);
                    
                    //mkdir(__DIR__ . (string)$item->codigo, 0777, true);
                    
                    $product = new Product();

                    $product->code = (string)$item->codigo;

                    $product->name = $item->nome;

                    $product->info = $item->embalagem;

                    $product->path_image = env('APP_URL').'/images/products/'.(string)$item->codigo.'/'.(string)$item->codigo.'.png';

                    $product->price = $item->preco;
                    
                    $product->barcode = $item->pbarcode;

                    $product->modeofuse = '...';

                    //$product->status = 1;

                    $product->column = $column;

                    $brand = Brand::findOrNew($item->fabricante);
                    $brand->id = $item->fabricante;
                    $brand->name = $item->nomefabricante;
                    $brand->status = 1;
                    $brand->save();

                    $category = Category::findOrNew($item->segmento);
                    $category->id = $item->segmento;
                    $category->name = $item->nomesegmento;
                    $category->save();

                    $group = Group::findOrNew($item->grupo);
                    $group->id = $item->grupo;
                    $group->name = $item->nomegrupo;
                    $group->category_id = $category->id;
                    $group->status = 1;
                    $group->save();

                    $product->brand_id = $brand->id;

                    $product->save();

                    $product->groups()->sync([$group->id]);

                    $column == 1 ? $column = 2 : $column = 1;
                    
                }
                

            });
        }

        if($check){
            return back()->with(['message' => 'Products imported successfully!', 'type' => 'success', 'icon' => 'check']);
        }

        return back()->with(['message' => 'Nothing to Import!', 'type' => 'info', 'icon' => 'exclamation-triangle']);

    }
}
