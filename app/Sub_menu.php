<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_menu extends Model
{
    protected $table = 'sub_menus';
    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
