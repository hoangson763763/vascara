<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Paren_category;

class CategoryController extends Controller
{
    public function index($cateSlug){
        $parent_category = DB::table('paren_categories')->where('slug',$cateSlug)->first();
        
        $product = Paren_category::find($parent_category->id)->product;
        return view('front-end.category',compact(['product','parent_category']));
    }
}
