<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
class ProductController extends Controller
{
    public function getAdd(){
        $db = DB::table('categories')->get();
        return view('back-end.addProduct',compact('db'));
    }

    public function postAdd(Request $request,ProductRequest $productRequest){
        
        $user = $request->session()->get('user');

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->title);
        $product->price = $request->price;
        $product->content = $request->content;
        $product->description = $request->description;
        if($request->discount == null){
            $product->discount = 0;
        }
        else{
            $product->discount = $request->discount;
        }
        
        $product->category_id = $request->cate;
        $product->title = $request->title;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        if($request->hasFile('feature_image') && $request->hasFile('special_image')){
            $file = $request->feature_image;
            $filename = $file->getClientOriginalName();
            $realPath = $file->getRealPath();
            $file->move('uploads',$filename);        
            $product->feature_image = $filename;

            $file_special = $request->special_image;
            $filename_special = $file_special->getClientOriginalName();
            $product->special_image = $filename_special;
            $file_special->move('uploads',$filename_special);

            $product->user_id = $user->id;
            $product->save();
            return redirect()->route('product.list')->with('message','Thêm sản phẩm thành công');
        }
    }

    public function list(){
        $db = DB::table('products')->get();
        
        return view('back-end.listProduct',compact(['db']));
    }

    public function getEdit($slug){
        $category = DB::table('categories')->get();
        $db = DB::table('products')->where('slug',$slug)->first();
        return view('back-end.editProduct',compact(['db','category']));
    }

    public function postEdit(Request $request,$slug){
        $name = $request->name;
        $code = $request->code;
        $slug = Str::slug($request->title);
        $title = $request->title;
        $color = $request->color;
        $size = $request->size;
        $cate = $request->cate;
        $price = $request->price;
        $quantity = $request->quantity;
        $discount = $request->discount;
        $description = $request->description;
        $content = $request->content;
        $file_path = public_path('uploads\\'.$request->feature_image_old);
        $file_path_special_image = public_path('uploads\\'.$request->special_image_old);
        $filename = $request->feature_image_old;
        $filename_special = $request->special_image_old;
        if($request->hasFile('feature_image')){
            $file = $request->feature_image;
            $filename = $file->getClientOriginalName();
            if(File::exists($file_path)){
                unlink($file_path);
                $file->move('uploads',$filename);  
            }
        }

        if($request->hasFile('special_image')){
            $file_special = $request->special_image;
            $filename_special = $file_special->getClientOriginalName();
            if(File::exists($file_path_special_image)){
                unlink($file_path_special_image);
                $file_special->move('uploads',$filename_special); 
            }
            else{
                $file_special->move('uploads',$filename_special); 
            }
        }

        DB::table('products')->where('slug',$slug)->update([
            'name' => $name,
            'code' => $code,
            'title' => $title,
            'color' => $color,
            'size' => $size,
            'slug' => $slug,
            'category_id' => $cate,
            'price' => $price,
            'quantity' => $quantity,
            'discount' => $discount,
            'description' => $description,
            'content' => $content,
            'feature_image' => $filename,
            'special_image' => $filename_special
        ]);

        return redirect()->back()->with('message','Cập nhật dữ liệu thành công');
    }

    public function delete($slug){
        $db = DB::table('products')->where('slug',$slug)->first();
        $relation = Product::find($db->id)->product_image;
        $file_path = public_path('uploads\\'.$db->feature_image);
        $file_path_special_image = public_path('uploads\\'.$db->special_image);
        
        foreach ($relation as $item) {
            $file_path_image_detail = public_path('uploads\image_product\\'.$item->image);
            if(File::exists($file_path_image_detail))
            {
                unlink($file_path_image_detail);
            }
            
            
        }


        if(File::exists($file_path) && File::exists($file_path_special_image)){
            unlink($file_path);
            unlink($file_path_special_image);
            DB::table('products')->where('slug',$slug)->delete();
        }


        

        return redirect()->back()->with('message','Xóa dữ liệu thành công');
    }
}

