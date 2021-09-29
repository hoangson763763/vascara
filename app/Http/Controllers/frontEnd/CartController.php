<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('user'))
        {
            $user = $request->session()->get('user')->id;
            $cart = DB::table('carts')->where('user_id',$user)->orderBy('id','desc')->get();
            
            return view('front-end.cart',compact('cart'));
        }
        
    }

    public function getadd(){
        return "ok";
    }

    public function add(Request $request){
        $user_id = $request->session()->get('user')->id;
        $cart = new Cart;
        $cart_old = DB::table('carts')->where('size',$request->size)->where('product_id',$request->product_id)->first();
        if($cart_old){
            
            $quantity = intval($request->quantity) + $cart_old->quantity;

            DB::table('carts')->where('id',$cart_old->id)->update(['quantity'=>$quantity]);
        }
        else{
            $cart->quantity = intval($request->quantity);
            $cart->size = $request->size;
            $cart->product_id = $request->product_id;
            $cart->price = intval($request->price);
            $cart->user_id = $user_id;
            
            $cart->save();
        }
        
        return redirect()->back()->with('message','Thêm vào giỏ hàng thành công');
    }

    public function delete($id){
        DB::table('carts')->where('id',$id)->delete();
        return redirect()->back()->with('message','Xóa sản phẩm thành công');
    }

    public function testajax(){
        $val = $_GET['val'];
        return $val;
    }
}
