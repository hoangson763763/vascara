<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\address;
use Illuminate\Support\Facades\DB;
class AddressController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('user'))
        {
            $user = $request->session()->get('user');
            $db = DB::table('addresses')->where('user_id',$user->id)->first();
            return view('front-end.address',compact('db'));
        }
        else
            return redirect()->route('checkout');
    }

    public function store(Request $request){
        $address = new address();
        if($request->session()->has('user')){

            $user = $request->session()->get('user');
            $db = DB::table('addresses')->where('user_id',$user->id)->first();
            if($db){
              DB::table('addresses')->where('user_id',$user->id)->update([
                'name' => $request->name,
                'city' => $request->city,
                'district' => $request->district,
                'ward' => $request->ward,
                'phone' => $request->phone,
                'detail_address' => $request->detail_address
              ]); 
              return redirect()->route('payment'); 
            }
            else{
                $address->user_id = $user->id;
                $address->name = $request->name;
                $address->city = $request->city;
                $address->district = $request->district;
                $address->ward = $request->ward;
                $address->phone = $request->phone;
                $address->detail_address = $request->detail_address;
                $address->save();
                return redirect()->route('payment'); 
            }
            
        }
        
    }
}
