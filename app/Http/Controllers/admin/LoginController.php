<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    public function index(Request $request){
        if($request->session()->has('user'))
        {
            if($request->session()->get('user')->level == 1)
            {
                return redirect()->route('index');
            }
            else{
                return redirect()->route('home');
            }
        }
        else{
            return view('back-end.login');
        }
        
    }
    public function store(Request $request,LoginRequest $loginRequest){
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('users')->where('email',$email)->first();
        if($user && Hash::check($password,$user->password)){
            if($user->level == 1)
            {
               $request->session()->put('user',$user);
                return redirect()->route('index');  
            }
            else{
                $request->session()->put('user',$user);
                return redirect()->route('home'); 
            }
           
        }
        else{
            return view('back-end.login')->with(['message'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
    }

    public function logout(Request $request){
        if($request->session()->has('user'))
        {
            $request->session()->flush();
            return redirect()->route('home');
        }
    }
}
