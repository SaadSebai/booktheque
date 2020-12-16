<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Msg_req extends Model
{
	use SoftDeletes;

    protected $dates = ['delete_at'];

    public function user() {

        return $this->belongsTo('App\User');
    }
}
