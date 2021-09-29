<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Cart extends Model
{
    protected $table = 'carts';

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'user_id','id');
    }
}
