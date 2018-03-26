<?php
namespace App\Http\Controllers\Auth;

use App\Models\Loyalty;
use Hash;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');

        $this->rules = [
            'name'  => 'required',
        ];

        $this->messages = [
            'name.required'   => 'You need to enter your name.',
            'email.required' => 'You need to enter your email.',
            'email.email' => 'You need to enter a valid email.',
        ];
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])
            ->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        if (Auth::guard('api')->attempt($credentials)) {
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'user' => $user,
                'access_token' => 'bearer ' . $token,
            ]);
        } else {
            return response()->json(['error' => 'Login or password is incorrect'], 401);
        }
    }

    public function logout(Request $request)
    {
        $credentials = $request->only('token');

        if(!$credentials) {
            return response()->json(['error' => 'Invalid Token or Token not provider'], 401);
        }

        JWTAuth::invalidate($credentials['token']);

        return response()->json(['message' => 'User successfully logged out'], 301);
    }

    public function register(Request $request)
    {
        $this->rules['email'] = 'required|email|unique:users';
        $this->messages['email.unique'] = 'This email is already registered. Do you want to recover your password?';

        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->gender       = $request->gender;
        $user->address      = $request->adress;
        $user->complement   = $request->complement;
        $user->neighborhood = $request->neighborhood;
        $user->city         = $request->city;
        $user->provider     = $request->provider;
        $user->provider_id  = $request->provider_id;

        if(!is_null($request->avatar))
        {
            $user->avatar = $request->avatar;
        }

        $user->password     = bcrypt($request->password);

        $user->save();

        Loyalty::create([
            'user_id' => $user->id,
            'points' => 0,
            'last_points' => 0
        ]);

        $userWithAllInfo = User::find($user->id);

        return response()->json([
            'user' => $userWithAllInfo,
        ], 201);
    }

    public function loginFacebook(Request $request)
    {
        $credentials = $request->only( 'provider_id');

        $user = User::where('provider_id', $credentials['provider_id'])
                    ->get();

//      VICTOR - 22/11 - POR FAVOR, NÃO MEXAM NESSE IF. NUNCA.
        if(!$user->isEmpty())
        {
            $token = JWTAuth::fromUser($user->first());

            $userWithAllInfo = collect($user)->first();

            return response()->json([
                'user' => $userWithAllInfo,
                'access_token' => 'bearer ' . $token,
            ], 201);
        }
        else
        {
            $phone = '';

            if(!is_null($request->email))
            {
                $email = $request->email;
            } else {
                $email = $request->provider_id .'@facebook.com';
            }

            if(!is_null($request->phone))
            {
                $phone = $request->phone;
            }

            $user = User::updateOrCreate(
                ['email'       => $email],
                [
                'name'        => $request->name,
                'avatar'      => $request->avatar,
                'provider'    => $request->provider,
                'provider_id' => $request->provider_id,
                'phone'       => $phone,
            ]);

            Loyalty::updateOrCreate([
                'user_id' => $user->id,
                'points' => 0,
                'last_points' => 0
            ]);

            $token = JWTAuth::fromUser($user);

            $newUserWithAllInfo = User::find($user->id);

            return response()->json([
                'user' => $newUserWithAllInfo,
                'access_token' => 'bearer ' . $token,
            ], 201);
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $userProvider = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('auth/'. $provider);
        }

        $authUser = $this->findOrCreateUser($userProvider, $provider);

        Auth::login($authUser, true);

        return response()->json(['message' => $provider . ' Login success'], 201);
    }

    private function findOrCreateUser($userProvider, $provider)
    {
        $authUser = User::where('provider_id', $userProvider->id)
            ->orWhere('email', $userProvider->email)->first();

        if (!$authUser)
        {
            $user               = new User();

            $user->avatar       = $userProvider->avatar;
            $user->name         = $userProvider->name;
            $user->email        = $userProvider->email;
            $user->provider     = $provider;
            $user->provider_id  = $userProvider->id;

            $user->save();
        }

        return $authUser;
    }
}