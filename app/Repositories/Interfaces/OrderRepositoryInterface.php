<?php

namespace App\Repositories\Interfaces;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface OrderRepositoryInterface
{
    public function createOrder(Order $order): Order;

    public function getOrdersForUser(int $id): Collection;
}
