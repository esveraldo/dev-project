<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::with('users')->get();

        if(!$location) {
            return response()->json(['message' => 'Location not found'], 404);
        }

        return response()->json($location, 200);
    }

    public function show($id)
    {
        $location = Location::where('id', $id)->with('users')->get();

        if(!$location) {
            return response()->json(['message' => 'User location not found'], 404);
        }

        return response()->json($location, 200);
    }

    public function store(Request $request)
    {
        $user = User::find($request->user_id);

        if(!is_null($user))
        {
            $lastRegisterConsult = Location::where('user_id', $request->user_id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();

            if(!$lastRegisterConsult->isEmpty())
            {
                $lastRegister = $lastRegisterConsult->first()->created_at;

                $diff = Carbon::now()->diffInMinutes($lastRegister);

                if($diff >= 30)
                {
                    $this->saveLocation($request);
                }
            } else {
                    $this->saveLocation($request);
            }
        }
    }

    private function saveLocation(Request $request)
    {
        $location = Location::create($request->except('user_id', 'distance'));
        $location->user()->associate($request->user_id);
        $location->save();
    }
}
