<?php

namespace App;

use App\Events\StockInputCreated;
use Illuminate\Database\Eloquent\Model;

class StockInput extends Model
{
    use StockMovements;

    protected $dispatchesEvents = [
        'created' => StockInputCreated::class
    ];
}
