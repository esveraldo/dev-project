<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Lista;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $numUsuarios = User::where('status', 1)->count();
        $numListas   = Lista::where('status', 1)->count();
        $numProdutos = Product::count();
        $numOfertas  = Offer::where('status', 1)->count();

        $androidUsers   = User::where('platform', 'android')->count();
        $iosUsers       = User::where('platform', 'ios')->count();

        $donutAppUsers = Charts::create('donut', 'c3')
            ->title(null)
            ->labels(['Android', 'IOS'])
            ->colors(['#000000', '#ffffff'])
            ->values([$androidUsers, $iosUsers]);

        $chart = Charts::multiDatabase('bar', 'highcharts')
            ->dataset('Número de usuários', User::all())
            ->dataset('Número de listas', Lista::all())
            ->dataset('Número de ofertas', Offer::all())
            ->title("Evolução do número de usuários do Aplicativo")
            ->elementLabel("Número de Usuários")
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupBy('platform')
            ->groupByMonth();


        return view('dashboards.index',
            compact('numUsuarios', 'numListas', 'numProdutos',
                'numOfertas', 'donutAppUsers', 'chart'));
    }
}
