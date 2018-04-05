<?php

namespace App\Listeners;

use App\Events\ProductUpdating;
use App\Mail\StockGreatherMaximum;

class CheckStockMaxListener
{
    /**
     * Handle the event.
     *
     * @param  ProductUpdating  $event
     * @return void
     */
    public function handle(ProductUpdating $event)
    {
        $product = $event->getProduct();
        if ($product->stock >= $product->stock_maximum) {
            \Mail::to('stock@stock.com')->send(new StockGreatherMaximum($product));
        }
    }
}
