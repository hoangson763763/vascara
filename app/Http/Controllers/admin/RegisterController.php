<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function index(){
        return view('back-end/register');
    }
    public function store(Request $request,RegisterRequest $registerRequest){
        $user = new User();
        $user -> name  = $request -> username;
        $user -> email = $request -> email;
        $user -> phone = $request -> phone;
        $user -> password = Hash::make($request -> password);
        $user -> level = 0;
        $user -> save();
        return redirect()->route('login');
    }
}
