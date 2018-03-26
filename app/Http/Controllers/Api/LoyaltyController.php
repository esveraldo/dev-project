<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use DB;
use App\Http\Controllers\Controller;

class LoyaltyController extends Controller
{
    public function card($user_id)
    {
        $user = User::where('id', $user_id)->with('loyalty')->first();

        return response()->json($user, 200);
    }
}
