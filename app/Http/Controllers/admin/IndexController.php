<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request ;
use App\Menu;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Product;

class IndexController extends Controller
{
    public function index(){
       $db = DB::table('products')->get();
        
        return view('back-end.listProduct',compact(['db']));
    }

    public function getAddMenu(){
        return view('back-end.addMenu');
    }

    public function postAddmenu(Request $request,MenuRequest $menuRequest){
        $menu = new Menu; 
        $menu->name = $request->name;
        $menu->slug = Str::slug($request->slug);
        $menu->icon = $request->icon;
        $menu->save();
        return redirect()->route('menuList')->with('message','Thêm dữ liệu thành công');
    }

    public function listMenu(){
        $db = DB::table('menus')->get();
        return view('back-end.listMenu',compact(['db']));

    }

    public function editMenu($id){
       $db = DB::table('menus')->find($id);
       return view('back-end/editMenu',compact('db'));
    }
    public function editPostMenu(Request $request){
        $name = $request->name;
        $slug = Str::slug($request->name);
        $icon = $request->icon;
        
        DB::table('menus')->where('id',$request->id)->update(['name' =>$name,'slug'=>$slug,'icon' => $icon]);
        return redirect()->back()->with('message','Thay đổi dữ liệu thành công');
    }

    public function deleteMenu($id){
        DB::table('menus')->where('id',$id)->delete();
        return redirect()->back()->with('message','Xóa dữ liệu thành công');
    }
}
