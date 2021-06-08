<?php

namespace App\Repositories\Order;


use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository 
{
    protected $orders;
    protected $products;

    function __construct()
    {
        $this->orders = new Order();
        $this->products = new Product();
    }

    public function create(){

    }

    public function getAll(){
        return $this->orders->all();
    }

    public function setStatus($id){
        $order = $this->orders->findOrFail($id);
        if($order->status == Order::ORDER_ACTIVE){
            $order['status'] = Order::ORDER_UNACTIVE;
        }else {
            $order['status'] = Order::ORDER_ACTIVE;
        }
        $order->update();
    }
}