<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\ProductImage;

class ProductImageController extends Controller
{
    public function getAdd($slug){
        $db = DB::table('products')->where('slug',$slug)->first();
        return view('back-end.addProductImage',compact('db'));
    }

    public function postAdd(Request $request,$slug){
        $product = DB::table('products')->where('slug',$slug)->first();
        if($request->file('list_img'))
        {
            $listImg = $request->file('list_img');
            foreach($listImg as $item){
                $filename = $item->getClientOriginalName();
                $item->move('uploads/image_product',$filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $filename
                ]); 
            }

            return redirect()->back();
        }

        
        
    }

    public function getList($slug){
        $db = DB::table('products')->where('slug',$slug)->first();
        $productImg = DB::table('product_images')->where('product_id',$db->id)->get();
        
        return view('back-end.listProductImage',compact(['db','productImg']));
        
    }

    public function delete($id){
        $id_product = ProductImage::find($id)->product->id;
        $db = DB::table('products')->where('id',$id_product)->first();
        $productImg_first =  $productImg = DB::table('product_images')->where('id',$id)->first();
        $file_path = public_path('uploads\\image_product\\'.$productImg_first->image);
        if(File::exists($file_path)){
            unlink($file_path);
             DB::table('product_images')->where('id',$id)->delete();
        }
        $productImg = DB::table('product_images')->get();
         return redirect()->back();
    }

}

