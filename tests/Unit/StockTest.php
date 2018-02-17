<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Incoming;
use App\Outgoing;
use App\Stock;

class StockTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStockQty()
    {
        $product_name = 'Macbook';
        // incoming product, stock qty must match
        $incoming = Incoming::create(['product_name' => $product_name, 'qty' => 10]);
        $stock = $incoming->stock;
        $this->assertEquals(10, $incoming->qty);
        $this->assertEquals(10, $stock->qty);
        // outgoing product, stock must match
        $outgoing = Outgoing::create(['product_name' => $product_name, 'qty' => 2]);
        $this->assertEquals(2, $outgoing->qty);
        $stock->refresh();
        $this->assertEquals(8, $stock->qty);
    }
}
