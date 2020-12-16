<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    public function user() {

        return $this->belongsTo('App\User');
    }
    public function prnd() {

        return $this->hasOne('App\Prnd');
    }
    public function matiere() {

        return $this->belongsTo('App\Matiere', 'lvr_matiere_id');
    }

}
