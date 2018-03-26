<?php

namespace App\Http\Controllers\Web;

use App\Models\Campaign;
use App\Models\Group;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\OfferCampaign;
use App\Repositories\FilterRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use OneSignal;

class OfferController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('pt_BR');
    }

    public function index()
    {
        $offers = Offer::all();
        $profiles = Campaign::all();

        return view('offers.index', compact('offers', 'profiles'));
    }

    public function show()
    {

    }

    public function status($id)
    {
        $offer = Offer::find($id);
        $name = $offer->product->name;

        if ($offer->status == 0) {
            $offer->update(['status' => 1]);
        } elseif ($offer->status == 1) {
            $offer->update(['status' => 0]);
        }

        return back()->with(['message' => 'Offer to [' . $name . '] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function create()
    {
        $products = Product::all();
        $stores = Store::all();
        $profiles = Campaign::all();

        return view('offers.create', compact('products', 'stores', 'profiles'));
    }

    public function store(Request $request, ImageRepository $repo)
    {
        $data = $request->all();
        $data['expire_at'] = date('Y-m-d H:i:s', strtotime($data['expire_at']));
        $data['start_at'] = date('Y-m-d H:i:s', strtotime($data['start_at']));
        $price = Product::find($data['product_id'])->price;

        if ($data['price'] >= $price) {
            return back()->with(['message' => 'The offer price must be lower than the price of the product!', 'type' => 'danger', 'icon' => 'times']);
        }

        $offer = Offer::create($data);
        $offer->stores()->sync($request->store_id);
        $offer->campaigns()->sync($request->profile_id);
        $name = $offer->product->name;

        return redirect()->route('offers.index')->with(['message' => 'Offer to [' . $name . '] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id)
    {
        $offer = Offer::find($id);
        $products = Product::all();
        $stores = Store::all();
        $profiles = Campaign::all();

        return view('offers.edit', compact('offer', 'products', 'stores', 'profiles'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $data = $request->except('expire_at');
        $price = Product::find($data['product_id'])->price;

        if ($data['price'] >= $price) {
            return back()->with(['message' => 'The offer price must be lower than the price of the product!', 'type' => 'danger', 'icon' => 'times']);
        } else {
            $offer->update($data);
            $offer->stores()->sync($request->store_id);
            $offer->campaigns()->sync($request->profile_id);
            $name = $offer->product->name;

            return back()->with(['message' => 'Offer to [' . $name . '] successfully updated!', 'type' => 'success', 'icon' => 'check']);
        }
    }

    public function destroy($id)
    {
        $offer = Offer::find($id);
        $name = $offer->product->name;
        $offer->stores()->sync([]);
        $offer->campaigns()->sync([]);
        $offer->delete();

        return back()->with(['message' => 'Offer to [' . $name . '] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }

    public function send(Request $request, FilterRepository $repo)
    {
        $offer = Offer::find($request->offer_id);

        $offerCamps = OfferCampaign::where('offer_id', $request->offer_id)->get();

        foreach ($offerCamps as $offerCamp){

            $users = $repo->filterUsers($offerCamp->campaign_id);

            foreach ($users as $user) {
                $offer->users()->syncWithoutDetaching([$user->id]);

                if ($user->onesignal_id) {
                    OneSignal::sendNotificationToUser('Olá ' . $user->name . ', temos uma oferta especial para você!', $user->onesignal_id, $url = null, $data = null, $buttons = null, $schedule = null);
                }
            }
        }

        return back()->with([
            'message' => 'Offer for [' . $offer->product->name . '] successfully send to users!',
            'type' => 'success',
            'icon' => 'check']);
    }
}
