<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Mail\StockGreatherMaximum;

class CheckStockMaxListener
{
    /**
     * Handle the event.
     *
     * @param  ProductUpdated  $event
     * @return void
     */
    public function handle(ProductUpdated $event)
    {
        $product = $event->getProduct();
        if ($product->stock >= $product->stock_maximum) {
            \Mail::to('stock@stock.com')->send(new StockGreatherMaximum($product));
        }
    }
}
