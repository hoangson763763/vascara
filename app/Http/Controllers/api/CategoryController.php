<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorie;

class CategoryController extends Controller
{
    public function show(){
        $category = Categorie::with('parent')->get();
        return response()->json($category);
    }
}
