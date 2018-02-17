<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_name'];

    public function incomings()
    {
        return $this->hasMany('App\Incoming');
    }
    public function outgoings()
    {
        return $this->hasMany('App\Outgoing');
    }
}
