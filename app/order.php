<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
