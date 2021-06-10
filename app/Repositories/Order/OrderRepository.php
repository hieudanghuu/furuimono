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
    protected $order_products;

    function __construct()
    {
        $this->orders = new Order();
        $this->products = new Product();
        $this->order_products = new OrderProduct();
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
        $orders->save();

        // create table trung gian 
        $order_products = $this->order_products->create([
            "product_id" => $request['product_id'],
            "order_id" => $orders['id']
        ]);
        $order_products->save();

        // edit product status
        $products = $this->products->findOrFail($request['product_id']);
        $products["active"] = Product::PRODUCT_UNACTIVE;
        $products->update();
    }

    public function update($request){
        $order = $this->orders->findOrFail($request['order_id']);

        $order['name'] = $request['name'];
        $order['address'] = $request['address'];
        $order['note'] = $request['note'];
        $order['phone'] = $request['phone'];

        if($request['product'] != 0){
            $order_products = $this->order_products->create([
                "product_id" => $request['product'],
                "order_id" => $request['order_id']
            ]);
            $order_products->save();
        }

        // edit product status
        if($request['product'] != 0){
            $products = $this->products->findOrFail($request['product']);
            $products["active"] = Product::PRODUCT_UNACTIVE;
            $products->update();
        }
        
        //update total order
        $total = 0;
        foreach($order->product as $item){
            $total += $item['price'];
        }
        $order['total'] = $total;

        $order->update();
    }

    public function delete($request){
        $this->order_products->where('product_id',$request['product_id'])->where('order_id',$request['order_id'])->delete();
        //update total order
        $order = $this->orders->findOrFail($request['order_id']);
        $total = 0;
        foreach($order->product as $item){
            $total += $item['price'];
        }
        $order['total'] = $total;

        $order->update();
        // edit product status
        $products = $this->products->findOrFail($request['product_id']);
        $products["active"] = Product::PRODUCT_ACTIVE;
        $products->update();

    }
    public function deleteOrder($id)
    {
        $order = $this->orders->findOrFail($id);
        foreach($order->orderProduct as $item){
            $item->delete();
        }
        foreach($order->product as $product){
            $product['active'] = Product::PRODUCT_ACTIVE;
            $product->update();
        }
        $order->delete();
    }

    public function search($request)
    {
        $key = $request['search'];
        $orders =  $this->orders->where('name','LIKE','%'.$key.'%')->paginate(10);
        return ['orders' => $orders, 'key' => $key];
    }
}