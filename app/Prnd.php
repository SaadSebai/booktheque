<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prnd extends Model
{
    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }
    public function livres(){

        return $this->belongsTo('App\Livre');
    }
}