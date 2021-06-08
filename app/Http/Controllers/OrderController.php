<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Repositories\Order\OrderRepository;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{

    protected $orders;
    protected $orderRepository;
    protected $products;
    protected $users;
    
    function __construct( OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orders = new Order();
        $this->products = new Product();
        $this->users = new User();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("cts.orders.list")->with(["orders" => $this->orders->paginate(10)]);
    }

    public function setStatusOrder($id)
    {
        $this->orders->setStatus($id);
        return redirect()->back();
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
        Session::flash('success', 'create success');
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
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
