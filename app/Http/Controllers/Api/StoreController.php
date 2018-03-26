<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return response()->json($stores, 200);
    }

    public function show($id)
    {
        $store = Store::with('products')->where('id', $id)->get();

        if(!$store) {
            return response()->json(['message' => 'Store not found'], 404);
        }

        return response()->json($store, 200);
    }
}
