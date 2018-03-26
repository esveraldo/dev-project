<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $user = User::where('email', '=', $request->get('email'))->first();

        if(!$user) {
            return response()->json(['status' => 'User not found'], 201);
        }

        $broker = $this->getPasswordBroker();
        $sendingResponse = $broker->sendResetLink($request->only('email'));

        if($sendingResponse !== Password::RESET_LINK_SENT) {
            return response()->json(['status' => 'Internal server error'], 500);
        }

        return response()->json(['message' => 'Um e-mail de recuperação foi enviado para ' . $user->email], 201);
    }

    private function getPasswordBroker()
    {
        return Password::broker();
    }
}