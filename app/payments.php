<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table = 'payments';

    public function charge()
    {
        return $this->hasOne('App\charges','id','id_charge');
    }

    public function debtor()
    {
        return $this->hasOne('App\User','id','id_debtor');
    }
}
