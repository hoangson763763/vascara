<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $new_product = DB::table('products')->where('discount','=',0)->orderBy('id','desc')->limit(8)->get();
        $sale_product = DB::table('products')->where('discount','>',0)->orderBy('id','desc')->limit(8)->get();
        return view('front-end.index',compact(['new_product','sale_product']));
    }
}
