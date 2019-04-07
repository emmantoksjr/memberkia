<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deu extends Model
{

    protected  $guarded = ['id'];

    public function payments()
    {
        return $this->hasMany('App\payment');
    }

}
