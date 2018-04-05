<?php

namespace App\Events;

use App\StockInput;

class StockInputCreated
{
    /**
     * @var StockInput
     */
    private $input;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(StockInput $input)
    {
        $this->input = $input;
    }

    /**
     * @return StockInput
     */
    public function getInput()
    {
        return $this->input;
    }
}
