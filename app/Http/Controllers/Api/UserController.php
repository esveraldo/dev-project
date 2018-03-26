<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Repositories\FilterRepository;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private $rules;
    private $messages;

    public function __construct()
    {
        $this->middleware('api');

        $this->rules = [
            'name'  => 'required',
        ];

        $this->messages = [
            'name.required'  => 'You need to enter your name.',
            'email.required' => 'You need to enter your email.',
            'email.email'    => 'You need to enter a valid email.',
        ];
    }

    public function index()
    {
        $users = User::all();

        return response()->json($users, 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function showByEmail($email)
    {
        $user = User::where('email', $email)->firt();

        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function update(Request $request, $id, ImageRepository $repository)
    {
        $this->rules['email'] =  'required|email|unique:users,email,'.$id;
        $this->messages['email.unique'] = 'This email is already in use by another user.';

        $validator = Validator::make($request->all(), $this->rules, $this->messages);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 200);
        }

        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $avatar = $request->avatar;

        if (!is_null($avatar))
        {
            if(filter_var($avatar, FILTER_VALIDATE_URL)) {
                $user->avatar = $request->avatar;
            } else {
                $user->avatar = $repository->base64toImage($avatar, 'avatar');
            }
        }

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->gender       = $request->gender;
        $user->address      = $request->address;
        $user->complement   = $request->complement;
        $user->neighborhood = $request->neighborhood;
        $user->city         = $request->city;
        $user->state        = $request->state;
        $user->platform     = $request->platform;
        $user->cpf          = $request->cpf;
        $user->onesignal_id = $request->onesignal_id;

        $user->save();

        return response()->json($user, 201);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $userId   = $user->id;
        $userName = $user->name;

        $user->delete();

        return response()->json(['message' => 'User ID ' . $userId . ' and name '. $userName .' has been deleted'], 200);
    }

    public function lists($id)
    {
        $userList = DB::table('users')
            ->join('lista_user', 'users.id', '=','lista_user.user_id')
            ->where('users.id', '=', $id)
            ->join('lists', 'lists.id', '=', 'lista_user.lista_id')
            ->select('lists.*')
            ->get();

        return response()->json($userList, 200);
    }

    public function productsOnList($user_id, $list_id)
    {
        $productList = DB::table('lista_product')
            ->where('lista_product.lista_id', '=', $list_id)
            ->join('products', 'products.id', '=', 'lista_product.product_id')
            ->select('products.*')
            ->get();

        return response()->json([$productList, 200]);
    }

    public function offers($user_id)
    {
        //$userOffers = User::find($user_id)->offers()->where('offers.status', 1)->get();
        $userOffers = User::find($user_id)->offersWithProducts()->where('offers.status', 1)->where('offers.start_at','<=',date('Y-m-d H:i:s'))->get();

        if(!$userOffers) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($userOffers, 200);
    }
}
