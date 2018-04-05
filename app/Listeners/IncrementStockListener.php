<?php

namespace App\Listeners;

use App\Events\StockInputCreated;

class IncrementStockListener
{
    /**
     * Handle the event.
     *
     * @param  StockInputCreated  $event
     * @return void
     */
    public function handle(StockInputCreated $event)
    {
        $input = $event->getInput();
        $product = $input->product;
        $product->stock = $product->stock + $input->quantity;
        $product->save();
    }
}
