<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\order;
use App\order_item;


class PaymentController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('user'))
        {

           $user = $request->session()->get('user');
           $cart = DB::table('carts')->where('user_id',$user->id)->get();
           if(count($cart) > 0)
           {
            return view('front-end.payment',compact('cart'));
           }
           else{
            return redirect()->route('cartIndex')->with('warning','Giỏ hàng của bạn chưa có sản phẩm nào');
           }
           
        }
        else{
            return redirect()->route('home');
        }
    }

    public function store(Request $request){
        if($request->payment == '1'){
            $order = new order();
            $user = $request->session()->get('user');
            $order->status = 0;
            $order->user_id = $user->id;
            $order->payment = $request->payment;
            $order->show_hide = 0;
            $order->note_user = $request->fnote;
            $order->save();


            $cart = DB::table('carts')->where('user_id',$user->id)->get();
            $db_Order = DB::table('orders')->where('user_id',$user->id)->where('status',0)->orderBy('id','desc')->first();
            
            foreach($cart as $item){
                $order_item = new order_item;
                $order_item->order_id = $db_Order->id;
                $order_item->quantity = $item->quantity;
                $order_item->size = $item->size;
                $order_item->price = $item->price;
                $order_item->product_id = $item->product_id;
                $order_item->save();
            }
            $cart = DB::table('carts')->where('user_id',$user->id)->delete();
            return redirect()->route('cartIndex')->with('message','Đặt hàng thành công');
        }
        else{
            $user = $request->session()->get('user');
            $cart = DB::table('carts')->where('user_id',$user->id)->get();
            if(count($cart) > 0)
            {
                $order = new order();
                
                $order->status = 0;
                $order->user_id = $user->id;
                $order->payment = $request->payment;
                $order->show_hide = 0;
                $order->note_user = $request->fnote;
                $order->save();


                
                $db_Order = DB::table('orders')->where('user_id',$user->id)->where('status',0)->orderBy('id','desc')->first();
                
                foreach($cart as $item){
                    $order_item = new order_item;
                    $order_item->order_id = $db_Order->id;
                    $order_item->quantity = $item->quantity;
                    $order_item->size = $item->size;
                    $order_item->price = $item->price;
                    $order_item->product_id = $item->product_id;
                    $order_item->save();
                }
                $cart = DB::table('carts')->where('user_id',$user->id)->delete();
                $code_order = 'VAS0'.$db_Order->id;
                return view('front-end/bankAccount',compact('code_order'));
            }
            else{
                return redirect()->route('cartIndex')->with('warning','Giỏ hàng của bạn chưa có sản phẩm nào'); 
            }
            
        }
    }
}
