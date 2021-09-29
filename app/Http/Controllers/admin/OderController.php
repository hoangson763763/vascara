<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OderController extends Controller
{
    public function index(){
        $order = DB::table('orders')->orderBy('status')->get();
        return view('back-end/listOrder',compact('order'));
    }

    public function detailOrder($id){
        $order_item = DB::table('order_items')->where('order_id',$id)->get();
        $order = DB::table('orders')->where('id',$id)->first();
        $user_id = DB::table('orders')->where('id',$id)->first()->user_id;
        $address = DB::table('addresses')->where('user_id',$user_id)->first();
        return view('back-end/detailOrder',compact(['order_item','address','order']));
    }

    public function statusShipping($id){
        $order = DB::table('orders')->where('id',$id)->first();
        if($order->status == 0)
        {
            DB::table('orders')->where('id',$id)->update(['status' => 1]); 
            return redirect()->back(); 
        }
        elseif($order->status == 1){
            DB::table('orders')->where('id',$id)->update(['status' => 0]); 
            return redirect()->back();
        }
    }

    public function delete($id){
        DB::table('orders')->where('id',$id)->delete();
        return redirect()->back()->with('message','Xóa dữ liệu thành công');
    }
}
