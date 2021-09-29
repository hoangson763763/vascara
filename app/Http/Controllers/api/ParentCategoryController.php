<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Paren_category;

class ParentCategoryController extends Controller
{
    public function show(){
        $parent = Paren_category::all();
        return response()->json($parent);
    }

    public function store(Request $request){
        return response()->json($request);
    }
}
