<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Paren_category;
class Categorie extends Model
{
    protected $table = 'categories';

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function parent(){
        return $this->belongsTo(Paren_category::class);
    }
}
