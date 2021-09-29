<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ParentCategoryRequest;
use App\Paren_category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ParentCategoryController extends Controller
{
    public function getAdd(){
        return view('back-end.addParentCategory');
    }

    public function postAdd(Request $request,ParentCategoryRequest $parentCategoryRequest){
        $parent_category = new Paren_category();
        $parent_category->name = $request->name;
        $parent_category->slug = Str::slug($request->name);
        $parent_category->code = $request->code;
        $parent_category->save();
        return redirect()->back()->with('message','Thêm dữ liệu thành công');
    }

    public function list(){
        $db = DB::table('paren_categories')->get();
        return view('back-end.listParentCategory',compact('db'));
    }

    public function getEdit($slug){
        $db = DB::table('paren_categories')->where('slug',$slug)->first();
        return view('back-end.editParentCategory',compact('db'));
    }

    public function postEdit(Request $request,$slug){
        $name = $request->name;
        $slugRequest = Str::slug($name);
        $code = $request->code;
        DB::table('paren_categories')->where('slug',$slug)->update(
            [
                'name'=>$name,
                'slug'=>$slugRequest,
                'code'=>$code
            ]
        );
        
        
        return redirect()->route('parent.list')->with('message','Cập nhật dữ liệu thành công');
    }

    public function delete($slug){
        DB::table('paren_categories')->where('slug',$slug)->delete();
        return redirect()->back()->with('message','Xóa dữ liệu thành công');
    }
}
