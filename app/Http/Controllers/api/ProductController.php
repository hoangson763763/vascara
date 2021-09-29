<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function show(){
        $product = Product::with('category')->get();
        return response()->json($product);
    }
}
