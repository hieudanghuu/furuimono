<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ProductController extends Controller
{
    protected $products;
    protected $productRepository;
    protected $images;
    protected $users;

    public function __construct(ProductRepository $productRepository)
    {
        $this->products = new Product();
        $this->productRepository = $productRepository;
        $this->images = new Picture();
        $this->users = new User();
    }

    public function list()
    {
        return view('cts.products.list',with(['products' => $this->products->paginate(10)]));
    }

    public function create()
    {
        return view('cts.products.create');
    }

    public function store(ProductRequest $request)
    {
        // dd("controller");
        $this->productRepository->createProduct($request);
        Session::flash('success', 'create success');
        return redirect()->route('cts.product.list');
    }

    public function edit($id)
    {
        return view('cts.products.edit',
            with([
                    'product' => $this->products->findOrFail($id),
                    'users' => $this->users->all(),
                ])
        );
    }

    public function update(ProductRequest $request,$id)
    {
        $this->productRepository->updateProduct($request,$id);
        Session::flash('success', 'update success');
        return redirect()->route('cts.product.list');
    }

    public function delete($id)
    {
        $this->productRepository->deleteProduct($id);
        Session::flash('success', 'delete success');
        return redirect()->route('cts.product.list');
    }

    public function view($id)
    {
        return view('cts.products.view',
            with([
                    'product' => $this->products->findOrFail($id),
                ])
        );
    }

    public function search(Request $request)
    {
        $result = $this->productRepository->search($request);
        // dd($result['product']->paginate(5));
        return view('cts.products.list',with(['products' => $result['product'],'search' => $result['key']]));
    }

    public function image($id)
    {
        return view('cts.products.edit_image',with(['product' => $this->products->findOrFail($id)]));
    }

    public function imageUpdate(Request $request,$id)
    {
        $this->productRepository->upImage($request,$id);
        Session::flash('success', 'update success');
        return redirect()->back();
    }
    public function imageDelete(Request $request)
    {
        // dd($request);
        $this->productRepository->imageDelete($request);
        Session::flash('success', 'delete success');
        return redirect()->route('cts.product.image',$request->product_id);
    }

    public function imageCreate($id_product)
    {
        return view('cts.products.create_image',with(['product' => $this->products->findOrFail($id_product)]));
    }

    public function imageStore(Request $request)
    {
        $this->productRepository->imageStore($request);
        Session::flash('success', 'create success');
        return redirect()->route('cts.product.image',$request['id_product']);
    }
}
