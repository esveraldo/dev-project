<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ListaProduct;
use App\Models\Lista;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function index()
    {
        $list = Lista::with('users', 'products')->get();

        return response()->json($list, 200);
    }

    public function show($id)
    {
        $list = Lista::find($id)->productsWithOffer()->get();

        if(!$list) {
            return response()->json(['message' => 'List not found'], 404);
        }

        return response()->json($list, 200);
    }

    public function store(Request $request)
    {
        $list = new Lista();
        $list->name  = $request->name;
        $list->token = str_random(45);
        $list->save();

        $listId = $list->id;

        Lista::find($listId)->users()->attach($request->user_id);

        return response()->json($list, 201);
    }

    public function update(Request $request, $id)
    {
        $list = Lista::find($id);
        $list->name = $request->name;
        $list->save();

        return response()->json($list, 201);
    }

    public function addProduct($list_id, Request $request)
    {
        $list = Lista::find($list_id);
        $product = $request->product_id;

        if (!$list) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        if (!$product) {
            return response()->json(['message' => 'It is necessary to inform the product to add'], 404);
        }

        Lista::find($list_id)->products()->syncWithoutDetaching($product);

        $lista = Lista::with('products')->where('id', $list_id)->get();

        return response()->json($lista, 201);
    }

    public function removeProduct($list_id, $product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        Lista::find($list_id)->products()->detach($product_id);
        $lista = Lista::find($list_id)->products()->get();

        return response()->json($lista, 201);
    }

    public function destroy($id)
    {
        $list = Lista::find($id);

        if(!$list) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $list->delete();

        return response()->json(['message' => 'Successfully deleted list'], 201);
    }

    public function share($id)
    {
        $list = Lista::find($id);

        if (!$list) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $token = DB::table('lists')->where('id', $id)->select('token')->get();

        return response()->json($token , 201);
    }
}
