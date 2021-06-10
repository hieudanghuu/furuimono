<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{
    protected $users;
    protected $products;
    protected $orders;
    function __construct()
    {
        $this->users = new User();
        $this->products = new Product();
        $this->orders = new Order();
    }
    public function index()
    {
        $sumUser = $this->users->count();
        $sumProduct = $this->products->where('active',1)->count();
        $sumOrder = $this->orders->count();
        $total = $this->orders->where('status',Order::ORDER_UNACTIVE)->sum('total');
    
        return view("cts.home",compact('sumUser','sumProduct','sumOrder','total'));
    }
}
