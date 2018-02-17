<?php

namespace App\Observers;

use App\Outgoing;
use App\Stock;

class OutgoingObserver
{
    public function created(Outgoing $outgoing)
    {
        $stock = Stock::firstOrCreate(['product_name' => $outgoing->product_name]);
        $outgoing->stock()->associate($stock);
        $stock->qty -= $outgoing->qty;
        $stock->save();
    }
}
