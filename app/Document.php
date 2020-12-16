<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    public function user() {

        return $this->belongsTo('App\User');
    }
}
