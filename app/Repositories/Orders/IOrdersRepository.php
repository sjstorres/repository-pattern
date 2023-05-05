<?php

namespace App\Repositories\Orders;

interface IOrdersRepository
{
    public function getAllOrders(array $orderDetails);
    public function getOrderById($orderId);
    public function deleteOrder($orderId);
    public function createOrder(array $orderDetails);
    public function updateOrder($orderId, array $newDetails);
    public function getFulfilledOrders();
}