<?php

namespace App\Http\Controllers\Web;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

class ImportSaleController extends Controller
{
    public function index()
    {
        return view('imports.sales.index');
    }

    public function store(Request $request)
    {
        $check = false;

        if ($request->hasFile('file')) {
            $check = true;
            Excel::load($request->file, function($reader) {

                $results = $reader->all();

                foreach ($results as $item)
                {
                    $check = Sale::where([
                            'store_id' => $item->identificador_filial,
                            'order_id' => $item->numero_pedido,
                            'client_cpf' => $item->cpf_cliente,
                            'product_barcode' => $item->barcode_produto,
                        ])->get()->count();

                    //dd($check);

                    if($check == 0){
                        $sale = new Sale();

                        $sale->store_id = (int) $item->identificador_filial;

                        $sale->order_id = (int) $item->numero_pedido;

                        $sale->date = $item->data_compra;

                        $sale->client_cpf = (string) $item->cpf_cliente;

                        $sale->client_name = $item->nome_cliente;

                        $sale->product_barcode = (int) $item->barcode_produto;

                        $sale->product_quantity = (int) $item->quantidade_produto;

                        $sale->order_total = $item->valor_total_pedido;

                        $sale->order_quantity = $item->quantidade_total_pedido;

                        //dd($sale);

                        $sale->save();

                    }

                }

            });
        }

        if($check){
            return back()->with(['message' => 'Sales imported successfully!', 'type' => 'success', 'icon' => 'check']);
        }

        return back()->with(['message' => 'Nothing to Import!', 'type' => 'info', 'icon' => 'exclamation-triangle']);

    }
}
