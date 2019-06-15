<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class charges extends Model
{
    protected $table = 'charges';

    public function owner()
    {
        return $this->hasOne('App\User','id','id_owner');
    }

    public function debtor()
    {
        return $this->hasMany('App\user','id', 'id_owner');
    }

    public function users_charges()
    {
        return $this->belongsTo('App\users_charges', 'id');
    }

}
