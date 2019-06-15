<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_charges extends Model
{
    protected $table = 'users_charges';

    public function charge()
    {
        return $this->hasMany('App\charges','id','id_charge');
    }

    public function user()
    {
        return $this->hasMany('App\User','id','id_user');
    }
    
}
