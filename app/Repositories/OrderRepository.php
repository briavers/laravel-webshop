<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository implements OrderRepositoryInterface
{
    public function createOrder(Order $order): Order
    {
        $order->save();

        return $order;
    }

    public function getOrdersForUser(int $id): Collection
    {
        return Order::whereUserId($id)
            ->orderByDesc('id')
            ->with('orderLines')
            ->with('orderLines.product')
            ->with('orderLines.product.parent')
            ->get();
    }
}
