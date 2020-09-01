<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Relacion de muchos a uno
    public function user(){
        return $this->belongsTO('App\User', 'user_id');
    }
}
