<?php

namespace App\Http\Controllers\Web;

use App\Models\Encarte;
use App\Models\Product;
use App\Models\Store;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class EncarteController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('pt_BR');
    }

    public function index()
    {
        $encartes = Encarte::all();

        return view('encartes.index', compact('encartes'));
    }

    public function show()
    {

    }

    public function status($id)
    {
        $encarte = Encarte::find($id);
        $name = $encarte->product->name;

        if ($encarte->status == 0) {
            $encarte->update(['status' => 1]);
        } elseif ($encarte->status == 1) {
            $encarte->update(['status' => 0]);
        }

        return back()->with(['message' => 'O encarte [' . $name . '] foi atualizado com sucesso!', 'type' => 'success', 'icon' => 'check']);
    }

    public function create()
    {
        $products = Product::all();
        $stores = Store::all();

        return view('encartes.create', compact('products', 'stores'));
    }

    public function store(Request $request, ImageRepository $repo)
    {
        $data = $request->all();
        $data['expire_at'] = date('Y-m-d H:i:s', strtotime($data['expire_at']));
        $data['start_at'] = date('Y-m-d H:i:s', strtotime($data['start_at']));
        $price = Product::find($data['product_id'])->price;

        if ($data['price'] >= $price) {
            return back()->with(['message' => 'O preço do encarte não pode ser maior do que o do produto', 'type' => 'danger', 'icon' => 'times']);
        }

        $encarte = Encarte::create($data);
        $encarte->stores()->sync($request->store_id);
        $name = $encarte->product->name;

        return redirect()->route('encartes.index')->with(['message' => 'O encarte [' . $name . '] foi criado com sucesso!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $encarte = Encarte::find($id);
        $products = Product::all();
        $stores = Store::all();

        return view('encartes.edit', compact('encarte', 'products', 'stores'));
    }

    public function update(Request $request, $id)
    {
        $encarte = Encarte::find($id);
        $data = $request->except('expire_at');
        $price = Product::find($data['product_id'])->price;

        if ($data['price'] >= $price) {
            return back()->with(['message' => 'The offer price must be lower than the price of the product!', 'type' => 'danger', 'icon' => 'times']);
        } else {
            $encarte->update($data);
            $encarte->stores()->sync($request->store_id);
            $name = $encarte->product->name;

            return back()->with(['message' => 'O encarte [' . $name . '] foi atualizado com sucesso!', 'type' => 'success', 'icon' => 'check']);
        }
    }

    public function destroy($id)
    {
        $encarte = Encarte::find($id);
        $name = $encarte->product->name;
        $encarte->stores()->sync([]);
        $encarte->delete();

        return back()->with(['message' => 'O encarte [' . $name . '] foi excluído com sucesso!', 'type' => 'success', 'icon' => 'check']);
    }
}
