<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($cateSlug,$productSlug){
        $product = DB::table('products')->where('slug',$productSlug)->first();
        $image_product = DB::table('product_images')->where('product_id',$product->id)->limit(4)->orderBy('id','desc')->get();
        $product_other = DB::table('products')->where('code',$product->code)->where('color','<>',$product->color)->limit(4)->orderBy('id','desc')->get();
        $product_other_cate = DB::table('products')->where('category_id',$product->category_id)->where('color','<>',$product->color)->limit(8)->orderBy('id','desc')->get();
        return view('front-end.product',compact(['product','image_product','product_other','product_other_cate']));
    }
}
