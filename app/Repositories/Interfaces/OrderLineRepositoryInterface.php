<?php

namespace App\Repositories\Interfaces;

use App\Models\OrderLine;

interface OrderLineRepositoryInterface
{
    public function createOrderLine(OrderLine $orderLine): OrderLine;
}
