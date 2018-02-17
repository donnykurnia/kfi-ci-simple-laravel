<?php

namespace App\Observers;

use App\Incoming;
use App\Stock;

class IncomingObserver
{
    public static function created(Incoming $incoming)
    {
        $stock = Stock::firstOrCreate(['product_name' => $incoming->product_name]);
        $incoming->stock()->associate($stock);
        $stock->qty += $incoming->qty;
        $stock->save();
    }
}
