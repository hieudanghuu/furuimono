<?php

namespace App\Repositories\Order;


use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

class OrderRepository 
{
    protected $orders;
    protected $products;
    protected $order_product;

    function __construct()
    {
        $this->orders = new Order();
        $this->products = new Product();
        $this->order_product = new OrderProduct();
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

    public function store($request)
    {
        // dd($this->products->findOrFail($request['product_id'])->price);
        $orders = $this->orders->create([
            "name" => $request['name'],
            "address" => $request['address'],
            "phone"=> $request['phone'],
            "note" => $request['note'],
            "product_id" => $request['product_id'],
            "user_id" => $request['user_id'],
            "total" => $this->products->findOrFail($request['product_id'])->price,
        ]);
        // create table trung gian
        $orders->save();
        $order_products = $this->order_product->create([
            "product_id" => $request['product_id'],
            "order_id" => $orders['id']
        ]);
        $order_products->save();

        // edit product status
        $products = $this->products->findOrFail($request['product_id']);
        $products["active"] = Product::PRODUCT_UNACTIVE;
        $products->update();
    }
}