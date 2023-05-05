<?php

namespace App\Repositories\Orders;

use App\Repositories\Orders\IOrdersRepository;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrdersRepository implements IOrdersRepository
{
    public function getAllOrders(array $orderDetails)
    {
        return DB::table('orders')
            ->select('client', 'details')
            ->where([
                ['client', $orderDetails['client']],
                ['details', $orderDetails['details']]
            ])
            ->get();
        //return Order::all();
    }

    public function getOrderById($orderId)
    {
        return Order::findorFail($orderId);
    }

    public function deleteOrder($orderId)
    {
        Order::destroy($orderId);
    }

    public function createOrder(array $orderDetails) 
    {
        return Order::create($orderDetails);
    }

    public function updateOrder($orderId, array $newDetails) 
    {
        return Order::whereId($orderId)->update($newDetails);
    }

    public function getFulfilledOrders() 
    {
        return Order::where('is_fulfilled', true);
    }
}