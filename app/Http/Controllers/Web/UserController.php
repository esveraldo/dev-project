<?php

namespace App\Http\Controllers\Web;

use App\Models\Loyalty;
use App\Models\Store;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Models\User;
use App\Repositories\FilterRepository;
use App\Models\Raffle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use OneSignal;

class UserController extends Controller
{
    public function index(Request $request, FilterRepository $repo)
    {
        $states         = User::where('state', '<>', null)->get()->groupBy('state');
        $cities         = User::where('city', '<>', null)->get()->groupBy('city');
        $neighborhoods  = User::where('neighborhood', '<>', null)->get()->groupBy('neighborhood');
        $stores         = Store::all();

        if(!$request){
            $users          = User::all();
            return view('users.index', compact('users', 'states', 'cities', 'neighborhoods', 'stores'));
        }

        $whereAge           = $request->age;
        $whereBirth         = null;
        $whereList          = $request->list;
        $whereStore         = $request->store;
        $wherePlatform      = $request->platform;
        $whereGender        = $request->gender;
        $whereState         = $request->state;
        $whereCity          = $request->city;
        $whereNeighborhood  = $request->neighborhood;

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
        );

        $query = User::query();

        if($request->excel){

            $query->select($request->fields);

            $users              = $repo->filterResults($query, $filters);

            return Excel::create('Users'.time(), function($excel) use($users) {
                $excel->sheet('Users', function($sheet) use($users) {
                    $sheet->fromModel($users);
                });
            })->export('xls');

        }else{

            $users              = $repo->filterResults($query, $filters);
            return view('users.index', compact('users', 'states', 'cities', 'neighborhoods', 'whereList', 'wherePlatform', 'whereStore', 'whereAge', 'whereGender', 'whereState', 'whereCity', 'whereNeighborhood', 'stores'));

        }

    }

    public function show($id){
        $user = User::find($id);
        $raffles = Raffle::find($id)->get();
        $transactions = TransactionType::all();
        //return view('users.show', compact('user','transactions'));
        return view('users.show', compact('user','transactions', 'raffles'));
    }

    public function status($id)
    {
        $ids = explode(',', $id);
        $names = null;
        foreach ($ids as $id) {
            $user = User::find($id);
            $name = $user->name;
            if ($user->status == 0) {
                $user->status = 1;
                $user->save();
            } elseif ($user->status == 1) {
                $user->status = 0;
                $user->save();
            }
            $names .= $name . '; ';
        }
        return back()
            ->with([
                'message' => 'User [' . $names . '] successfully updated!',
                'type' => 'success',
                'icon' => 'check']);
    }

    public function points(Request $request){

        $data = $request->except('_token');

        $type = TransactionType::find($data['transaction_type_id']);

        $description = $type->description;
        $operator = $type->operator;

        $data['description'] = $description;

        $transaction = Transaction::create($data);

        $user = User::find($data['user_id']);

        if($user->loyalty){
            $loyalty = $user->loyalty;
        }else{
            $loyalty = Loyalty::create([
                'user_id'       => $user->id,
                'points'        => 0,
                'last_points'   => 0,
            ]);
        }

        if($operator == '+'){
            $points = $loyalty->points + $data['points'];
            $text = 'receber '.$data['points'].' pontos de fidelidade!';
        }elseif($operator == '-'){
            $points = $loyalty->points - $data['points'];
            $text = 'perder '.$data['points'].' pontos de fidelidade!';
        }else{
            $points = $loyalty->points;
        }

        $loyalty->update(['last_points' => $loyalty->points, 'points' => $points]);

        if($user->onesignal_id) {
            OneSignal::sendNotificationToUser('Olá '.$user->name.', você acabou de '.$text.'!', $user->onesignal_id, $url = null, $data = null, $buttons = null, $schedule = null);
        }

        return back()->with(['message' => 'Points successfully updated!', 'type' => 'success', 'icon' => 'check']);

    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $user = User::create($request->all());
        $name = $user->name;
        return redirect()->route('users.index')->with(['message' => 'User ['.$name.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->update($request->all());
        $name = $user->name;
        return back()->with(['message' => 'User ['.$name.'] successfully updated!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id){
        $user = User::find($id);
        $name = $user->name;
        $user->delete();
        return back()->with(['message' => 'User ['.$name.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }
}
