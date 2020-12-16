<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
	protected $table = 'matieres';
    public function livre() {

        return $this->hasMany('App\Livre');
    }
}
