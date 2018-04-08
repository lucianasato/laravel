<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Mail\StockLessMinimum;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckStockMinListener
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
        if ($product->stock < ($product->stock_maximum*0.1)) {
            \Mail::to('stock@stock.com')->send(new StockLessMinimum($product));
        }
    }
}
