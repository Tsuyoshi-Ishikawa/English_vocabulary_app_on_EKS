<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Validation\Rule;

class Word extends Model
{
    protected $guarded = array('id');

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function favo_users() {
        return $this->belongsToMany('App\User');
    }
}
