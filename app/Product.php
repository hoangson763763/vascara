<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;
use App\User;
use App\ProductImage;
use App\Cart;
class Product extends Model
{
    protected $table = 'products';

    public function category(){
    	return $this->belongsTo(Categorie::class,'category_id','id');
    }

    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function product_image(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function order_item(){
         return $this->hasMany(order_item::class);
    }
}
