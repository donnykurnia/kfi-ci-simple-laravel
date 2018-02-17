<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    protected $fillable = ['product_name', 'qty'];

    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }
}
