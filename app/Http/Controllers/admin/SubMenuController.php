<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
class SubMenuController extends Controller
{
    public function getAdd(){
                
        $db = Menu::all();
        return view('back-end.addSubMenu',compact('db'));
    }

    public function postAdd(){

    }
}
