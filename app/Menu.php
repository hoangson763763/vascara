<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function sub_menus(){
        return $this->hasMany('App\Sub_menu');
    }
}
