<?php

namespace App\Http\Controllers\Web;

use Alexpechkarev\GoogleGeocoder\Facades\GoogleGeocoderFacade;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();

        return view('stores.index', compact('stores'));
    }

    public function show()
    {
        //
    }

    public function location($address)
    {
        $address = isset($address) ? $address : 'Brasil';
        $param = array(
            "address" => $address,
            "components" => "country:BR",
            "language" => "pt-BR",
        );
        return GoogleGeocoderFacade::geocode('json', $param);
    }

    public function create()
    {
        $stores = Store::all();

        return view('stores.create', compact('stores'));
    }

    public function store(Request $request, ImageRepository $repo)
    {
        $store = Store::create($request->except('image'));
        $name = $store->name;

        if($request->hasFile('image')) {
            $store->path_image = $repo->saveImage($request->image, $store->id, 'stores', null, 250);
        }

        $store->save();

        return redirect()->route('stores.index')->with(['message' => 'Store [' . $name . '] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $store = Store::find($id);

        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, $id)
    {
        $store = Store::find($id);
        $store->update($request->all());
        $name = $store->name;

        return back()->with(['message' => 'Store [' . $name . '] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        $name = $store->name;
        $store->delete();

        return back()->with(['message' => 'Store [' . $name . '] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }

    public function offersAjax($id)
    {
        return response()->json(Store::where('id', $id)->with('offers')->first());
    }
}
