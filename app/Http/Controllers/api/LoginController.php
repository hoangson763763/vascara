<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Support\Str;
use App\User;
class LoginController extends Controller
{
    public function store(ApiLoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
           $user = User::where('email',$request->email)->first();
           $user->token = $user->createToken('App')-> accessToken;
           return response()->json($user); 
        }
        else{
            return response()->json(['message' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
        }
    }

    public function infoUser(Request $request){
        return response()->json($request->user('api'));
    }

    public function register(){
        return 'abc';
    }
}
