<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;



class Paren_category extends Model
{
    protected $table = 'paren_categories';

    public function category(){
        return $this->hasMany(Categorie::class,'parent_id','id');
    }

    public function product(){
        return $this->hasManyThrough('App\Product','App\Categorie','parent_id','category_id','id','id');
    }
}
