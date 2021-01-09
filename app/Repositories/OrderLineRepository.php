<?php

namespace App\Repositories;

use App\Models\OrderLine;
use App\Repositories\Interfaces\OrderLineRepositoryInterface;

class OrderLineRepository implements OrderLineRepositoryInterface
{
    public function createOrderLine(OrderLine $orderLine): OrderLine
    {
        $orderLine->save();

        return $orderLine;
    }
}
