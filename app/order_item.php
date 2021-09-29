<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $table = 'order_items';

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
