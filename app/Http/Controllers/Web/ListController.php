<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Lista;
use App\Models\Product;
use App\Models\User;
use App\Repositories\FilterRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use OneSignal;

class ListController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $lists = Lista::with('admins', 'products')
                    ->whereHas('admins')
                    ->get();

        //$users = User::with('lists')->get(['users.id', 'users.name']);
        $profiles = Campaign::all();

        return view('lists.index', compact('products', 'lists', 'profiles'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::User()->id;

        $list         = new Lista();
        $list->name   = $request->name;
        $list->cacula = 1;
        $list->token  = str_random(45);

        $list->save();

        $list->products()->sync($request->product_id);
        Lista::find($list->id)->admins()->attach($user_id);

        return back()->with([
            'message' => 'List ['. $list->name .'] successfully created!',
            'type' => 'success',
            'icon' => 'check']);
    }

    public function send(Request $request, FilterRepository $repo)
    {
        $list = Lista::find($request->list_id);

        $users = $repo->filterUsers($request->profile_id);

        foreach($users as $user){
            $list->users()->syncWithoutDetaching([$user->id]);

            if($user->onesignal_id){
                OneSignal::sendNotificationToUser('Olá '.$user->name.', criamos uma lista especial para você!', $user->onesignal_id, $url = null, $data = null, $buttons = null, $schedule = null);
            }
        }

        return back()->with([
            'message' => 'List ['. $list->name .'] successfully send to users!',
            'type' => 'success',
            'icon' => 'check']);
    }

    public function share($token){
        $lista = Lista::where('token', $token)->first();
        return view('lists.shared', compact('lista'));
    }

    public function productsAjax($id)
    {
        return response()->json(Lista::where('id', $id)->with('products')->first());
    }

    public function destroy($id)
    {
        $lista = Lista::find($id);
        $name = $lista->name;
        $lista->delete();

        return back()->with(['message' => 'List ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
