<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\OrderRequest;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{

    protected $orders;
    protected $orderRepository;
    protected $products;
    protected $users;
    protected $order_products;
    
    function __construct( OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orders = new Order();
        $this->products = new Product();
        $this->users = new User();
        $this->order_products = new OrderProduct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("cts.orders.list")->with(["orders" => $this->orders->where('status',Order::ORDER_ACTIVE)->orderByDesc('updated_at')->paginate(10)]);
    }

    public function setStatusOrder($id)
    {
        $this->orderRepository->setStatus($id);
        return redirect()->back();
    }

    public function orderDoneView()
    {
        return view("cts.orders.formOrderDone")->with(["orders" => $this->orders->where('status',Order::ORDER_UNACTIVE)->orderByDesc('updated_at')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("cts.orders.create")->with([
            "products" => $this->products->where('active',Product::PRODUCT_ACTIVE)->get(),
            'product' => $this->products->findOrFail($id),
            'users' => $this->users->all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $this->orderRepository->store($request);
        Session::flash('success', 'Tạo Thành Công');
        return redirect()->route('order.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_id = $this->orders->findOrFail($id)->product_id;
        return view("cts.orders.edit")->with([
            "products" => $this->products->where('active',Product::PRODUCT_ACTIVE)->get(),
            'product' => $this->products->findOrFail($product_id),
            'users' => $this->users->all(),
            'order' => $this->orders->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request)
    {
        $this->orderRepository->update($request);
        Session::flash('success', 'cập Nhật Thành Công');
        return redirect()->route('order.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->orderRepository->deleteOrder($id);
        return redirect()->back();
    }

    public function deleteProduct(Request $request){
        $this->orderRepository->delete($request);

        Session::flash('success', 'Xóa Thành Công');
        return redirect()->route('order.list');
    }

    public function search(Request $request)
    {
        $result = $this->orderRepository->search($request);
        return view('cts.orders.list',with(['orders' => $result['orders'],'search' => $result['key']]));
    }
}
