<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Repositories\FilterRepository;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create(Request $request, FilterRepository $repo)
    {
        $products       = Product::all();
        $states         = User::where('state', '<>', null)->get()->groupBy('state');
        $cities         = User::where('city', '<>', null)->get()->groupBy('city');
        $neighborhoods  = User::where('neighborhood', '<>', null)->get()->groupBy('neighborhood');
        $stores         = Store::all();

        if(!$request){
            $users          = User::all();
            return view('campaigns.create', compact('users', 'states', 'cities', 'neighborhoods', 'stores', 'products'));
        }

        $name               = $request->name;
        $description        = $request->description;

        $whereAge           = $request->age;
        $whereBirth         = null;
        $whereList          = $request->list;
        $whereStore         = $request->store;
        $wherePlatform      = $request->platform;
        $whereGender        = $request->gender;
        $whereState         = $request->state;
        $whereCity          = $request->city;
        $whereNeighborhood  = $request->neighborhood;
        $whereProduct       = $request->product;

        if($whereAge){
            if($whereAge != '10,100'){
                $whereBirth           = explode(',', $whereAge);
                $whereBirth           = array(
                    date("Y-m-d", strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " - ".$whereBirth[0]." year")),
                    date("Y-m-d", strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " - ".$whereBirth[1]." year"))
                );
            }else{
                $whereBirth = null;
            }
        }

        $filters = Array(
            'lists'         => $whereList,
            'platform'      => $wherePlatform,
            'gender'        => $whereGender,
            'birth'         => $whereBirth,
            'state'         => $whereState,
            'city'          => $whereCity,
            'neighborhood'  => $whereNeighborhood,
            'stores'        => $whereStore,
            'products'      => $whereProduct,
        );

        $query = User::query();

        $users              = $repo->filterResults($query, $filters);

        if($request->save){
            $save = $this->store($request);
            return redirect()->route('campaigns.index')->with(['message' => 'Campaign ' . $save->name .' successfully created!', 'type' => 'success', 'icon' => 'check']);
        }

        return view('campaigns.create', compact('name', 'description', 'users', 'states', 'cities', 'products', 'neighborhoods', 'whereList', 'wherePlatform', 'whereProduct', 'whereStore', 'whereAge', 'whereGender', 'whereState', 'whereCity', 'whereNeighborhood', 'stores'));

    }

    public function store($request)
    {
        $data = $request->all();

        $data['ages']           = json_encode($request->age);
        $data['lists']          = json_encode($request->list);
        $data['stores']         = json_encode($request->store);
        $data['platforms']      = json_encode($request->platform);
        $data['genders']        = json_encode($request->gender);
        $data['states']         = json_encode($request->state);
        $data['cities']         = json_encode($request->city);
        $data['neighborhoods']  = json_encode($request->neighborhood);
        $data['products']       = json_encode($request->product);

        $campaign = Campaign::create($data);

        return $campaign;
    }

    public function edit(Request $request, $id, FilterRepository $repo)
    {
        $campaign       = Campaign::find($id);
        $products       = Product::all();
        $states         = User::where('state', '<>', null)->get()->groupBy('state');
        $cities         = User::where('city', '<>', null)->get()->groupBy('city');
        $neighborhoods  = User::where('neighborhood', '<>', null)->get()->groupBy('neighborhood');
        $stores         = Store::all();

        $name               = $request->name ?: $campaign->name;
        $description        = $request->description ?: $campaign->description;

        $whereAge           = $request->age ?: \GuzzleHttp\json_decode($campaign->ages);
        $whereBirth         = null;
        $whereList          = $request->list ?: \GuzzleHttp\json_decode($campaign->lists);
        $whereStore         = $request->store ?: \GuzzleHttp\json_decode($campaign->stores);
        $wherePlatform      = $request->platform ?: \GuzzleHttp\json_decode($campaign->platforms);
        $whereGender        = $request->gender ?: \GuzzleHttp\json_decode($campaign->genders);
        $whereState         = $request->state ?: \GuzzleHttp\json_decode($campaign->states);
        $whereCity          = $request->city ?: \GuzzleHttp\json_decode($campaign->cities);
        $whereNeighborhood  = $request->neighborhood ?: \GuzzleHttp\json_decode($campaign->neighborhoods);
        $whereProduct       = $request->product ?: \GuzzleHttp\json_decode($campaign->products);

        if($whereAge){
            if($whereAge != '10,100'){
                $whereBirth           = explode(',', $whereAge);
                $whereBirth           = array(
                    date("Y-m-d", strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " - ".$whereBirth[0]." year")),
                    date("Y-m-d", strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " - ".$whereBirth[1]." year"))
                );
            }else{
                $whereBirth = null;
            }
        }

        $filters = Array(
            'lists'         => $whereList,
            'platform'      => $wherePlatform,
            'gender'        => $whereGender,
            'birth'         => $whereBirth,
            'state'         => $whereState,
            'city'          => $whereCity,
            'neighborhood'  => $whereNeighborhood,
            'stores'        => $whereStore,
            'products'      => $whereProduct,
        );

        $query = User::query();
       

        $users              = $repo->filterResults($query, $filters);

        if($request->save){
            $save = $this->update($request, $id);
            return redirect()->route('campaigns.index')->with(['message' => 'Campaign ' . $save->name .' successfully updated!', 'type' => 'success', 'icon' => 'check']);
        }

        return view('campaigns.create', compact('campaign', 'name', 'description', 'users', 'states', 'cities', 'products', 'neighborhoods', 'whereList', 'wherePlatform', 'whereProduct', 'whereStore', 'whereAge', 'whereGender', 'whereState', 'whereCity', 'whereNeighborhood', 'stores'));

    }

    public function update($request, $id)
    {
        $data = $request->all();

        $data['ages']           = json_encode($request->age);
        $data['lists']          = json_encode($request->list);
        $data['stores']         = json_encode($request->store);
        $data['platforms']      = json_encode($request->platform);
        $data['genders']        = json_encode($request->gender);
        $data['states']         = json_encode($request->state);
        $data['cities']         = json_encode($request->city);
        $data['neighborhoods']  = json_encode($request->neighborhood);
        $data['products']       = json_encode($request->product);

        $campaign = Campaign::find($id);

        $campaign->update($data);

        return $campaign;
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        $name = $campaign->name;
        $campaign->delete();
        return back()->with(['message' => 'Campaign ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }

    public function show($id, FilterRepository $repository)
    {
        $users = $repository->filterUsers($id);

        return view('campaigns.show', compact('users'));
    }
    
    public function showUser()
    {
        $email = \Illuminate\Support\Facades\Input::post('email');
        $campaign = Campaign::all();
        $users = array();
        foreach ($campaign as $value){
            $users = $value['name'];
        }
        
        return view('campaigns.show-user', ['users' => $users]);
    }
}
