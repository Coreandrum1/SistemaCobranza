<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'users';


    public function owner()
    {
        return $this->hasOne('App\User','id_owner');
    }

    public function users_charges()
    {
        return $this->belongsTo('App\users_charges', 'id');
    }

    public function payment()
    {
        return $this->belongsTo('App\payments', 'id');
    }
}
