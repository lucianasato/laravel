<?php

namespace App\Listeners;

use App\Events\StockOutputCreated;

class DecrementStockListener
{
    /**
     * Handle the event.
     *
     * @param  StockOutputCreated  $event
     * @return void
     */
    public function handle(StockOutputCreated $event)
    {
        $output = $event->getOutput();
        $product = $output->product;
        $product->stock = $product->stock - $output->quantity;
        $product->save();
    }
}
