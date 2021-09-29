<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Categorie;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function getAdd(){
        $db = DB::table('paren_categories')->get();
        return view('back-end/addCategory',compact('db'));
    }

    public function postAdd(Request $request,CategoryRequest $categoryRequest){
        $cate = new Categorie();
        $cate->name = $request->name;
        $cate->slug = Str::slug($request->name);
        $cate->parent_id = $request->parent;
        $cate->code = $request->code;
        $cate->save();
        return redirect()->route('cate.list')->with('message','Thêm dữ liệu thành công');
    }

    public function list(){
        $db = DB::table('categories')->get();
        return view('back-end.listCategory',compact('db'));
    }

    public function getEdit($slug){
        $db = DB::table('categories')->where('slug',$slug)->first();
        return view('back-end.editCategory',compact('db'));
    }

    public function postEdit(Request $request){
        $name = $request->name;
        $slug = Str::slug($name);
        $code = $request->code;
        $id = $request->id;
        DB::table('categories')->where('id',$id)->update(
            [
                'name'=>$name,
                'slug'=>$slug,
                'code'=>$code
            ]
        );
        return redirect()->route('cate.list')->with('message','Cập nhật dữ liệu thành công');
    }

    public function delete($slug){
        DB::table('categories')->where('slug',$slug)->delete();
        return redirect()->back()->with('message','Xóa dữ liệu thành công');
    }
}
