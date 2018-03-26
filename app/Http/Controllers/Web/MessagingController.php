<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Messaging;
use App\Models\User;
use App\Repositories\FilterRepository;
use Illuminate\Http\Request;
use OneSignal;

class MessagingController extends Controller
{
    public function index(){
        $messages = Messaging::all();
        $profiles = Campaign::all();
        return view('messagings.index', compact('messages', 'profiles'));
    }

    public function store(Request $request)
    {
        $messaging = Messaging::create($request->all());
        $title = $messaging->title;

        return redirect()->route('messagings.index')->with(['message' => 'Notification ['.$title.'] successfully created!', 'type' => 'success', 'icon' => 'check']);
    }

    public function destroy($id)
    {
        $messaging = Messaging::find($id);
        $title = $messaging->title;
        $messaging->delete();

        return back()->with(['message' => 'Messaging ['.$title.'] successfully deleted!', 'type' => 'success', 'icon' => 'check']);
    }

    public function send(Request $request, FilterRepository $repo, $id)
    {

        $messaging = Messaging::find($id);

        if($request->profile_id == 0){
            OneSignal::sendNotificationToAll($messaging->message);
        }else{
            $campaign       = Campaign::find($request->profile_id);

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

            foreach($users as $user){
                if($user->onesignal_id){
                    OneSignal::sendNotificationToUser($messaging->message, $user->onesignal_id, $url = null, $data = null, $buttons = null, $schedule = null);
                }
            }
        }

        return back()->with([
            'message' => 'Message ['. $messaging->title .'] successfully send to users!',
            'type' => 'success',
            'icon' => 'check']);
    }

}
