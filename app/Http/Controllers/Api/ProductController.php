<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use App\Models\Offer;
use App\Models\Encarte;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function index()
    {
        $products = Product::where(['status' => 1])->whereHas('brand', function($q) {
            $q->where('status', 1);
        })->with('brand', 'groups', 'images', 'offers')->get();

        return response()->json($products, 200);
    }

    public function show($id,$type)
    {
        if($type == 'true'){
            //$product = Product::where('id', $id)->with('images', 'tags', 'offers', 'stores')->get();
            // RAYLAN - MUDAR ISSO DEPOIS
            $offer = Offer::where(['product_id' => $id, 'status' => 1])->first();

            $stores = Offer::where('id', $offer->id)->with('stores')->get();

            $product = Product::where('id', $id)->with('images', 'tags', 'offers')->get();

            $product[0]->stores = $stores[0]->stores;
        }else{
            $encarte = Encarte::where(['product_id' => $id, 'status' => 1])->first();

            $stores = Encarte::where('id', $encarte->id)->with('stores')->get();

            $product = Product::where('id', $id)->with('images', 'tags', 'encartes')->get();

            $product[0]->stores = $stores[0]->stores;
        }

        if(!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product,200);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if(!$product) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product has been deleted'], 204);
    }

    public function similarProducts($product_id)
    {
        //VICTOR - 30Œ11 - Realiza três selects no banco para buscar os produtos similares.
        //1. Busca as tags do produto. (Em product_tag)
        //2. Busca os produtos com a mesma tag. (Em product_tag)
        //3. Busca todas as informações do produto. (Em products)
        $similarProducts = DB::select(DB::raw(
            'SELECT 
                products.*
              FROM
                products
              WHERE
                products.id IN (SELECT 
                product_tag.product_id
              FROM
                product_tag
              WHERE
                product_tag.tag_id IN (SELECT 
                product_tag.tag_id
              FROM
                product_tag
              WHERE
                product_tag.product_id = ' . $product_id . ')
              AND 
              product_id <> ' . $product_id . ')'
        ));

        //Raylan - Versão em Eloquent da Query acima.
        /*$product = Product::find($product_id);

        $similarProducts = Product::query()->with('tags');

        $similarProducts = $similarProducts->whereHas('tags', function ($query) use ($product){
            $query->where('tag_id', $product->tags->toArray());
        })->get();*/

        if(!$similarProducts) {
            return response()->json(['message' => 'Similar Products not found'], 404);
        }

        return response()->json($similarProducts,200);
    }

    public function sameBrand($product_id, $brand_id, $type)
    {
        if($type == 'true') {
            $sameBrand = DB::table('products')
                ->join('offers', 'products.id', '=', 'offers.product_id')
                ->where('brand_id', 'like', $brand_id)
                //VICTOR - 15/12 - Status removido do produto
                //->where('products.status', '=', 1)
                //VICTOR - 30/11 - O where abaixo, remove da response o produto
                //usado no aplicativo para acessar as marcas similares.
                ->where('products.id', '<>', $product_id)
                ->select('products.*')
                ->orderBy('price', 'asc')
                ->get();
        }else{
            $sameBrand = DB::table('products')
                ->join('encartes', 'products.id', '=', 'encartes.product_id')
                ->where('brand_id', 'like', $brand_id)
                //VICTOR - 15/12 - Status removido do produto
                //->where('products.status', '=', 1)
                //VICTOR - 30/11 - O where abaixo, remove da response o produto
                //usado no aplicativo para acessar as marcas similares.
                ->where('products.id', '<>', $product_id)
                ->select('products.*')
                ->orderBy('price', 'asc')
                ->get();
        }

        if(!$sameBrand) {
            return response()->json(['message' => 'Products with same brand not found'], 404);
        }

        return response()->json($sameBrand,200);
    }

    public function catalog(Request $request)
    {
        $lat  = $request->lat;
        $lng  = $request->lng;
        $distance = $request->distance;

        //Victor - Busca os produtos do encarte a partir da localização do usuário
        $catalog = Encarte::getByDistance($lat, $lng, $distance);

        //Victor - Chama a função de outro controller para salvar a localização do usuário com uma requisição
        app('App\Http\Controllers\Api\LocationController')->store($request);

        return response()->json($catalog, 200);
    }
}
