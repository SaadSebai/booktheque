<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'prenom','ville' ,'sexe' , 'email','actv' , 'password', 'telephon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function livres(){

        return $this->hasMany('App\Livre');
    }

    public function documents(){

        return $this->hasMany('App\Document');
    }
    public function msg_reqs(){

        return $this->hasMany('App\Msg_req');
    }
    public function prnds(){

        return $this->hasMany('App\Prnd' , 'id' , 'user_id');
    }
}
