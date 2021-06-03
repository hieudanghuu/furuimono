<?php

namespace App\Repositories\Product;


use App\Models\Product;

use App\Models\Picture;
use Illuminate\Support\Facades\Auth;

class ProductRepository 
{
    protected  $products;
    protected  $images;

    public function __construct()
    {
        $this->products = new Product();
        $this->images = new Picture();
    }

    public function createProduct($request)
    {
        $products = $this->products->create([
            'name' => $request['name'],
            'price' => $request['price'],
            'discription' => $request['discription'],
            'user_id' =>Auth::user()->id,
       
        ]);

        // dd($products);
        if($request->hasFile('image') ){
            $image = $request->image;
            $path = $image->store('images','public');
            $products['image'] = $path;         
        }
        $products->save();
        if( $request->hasFile('images')){
            foreach($request->images as $item){
                $path = $item->store('images','public');
                $images = $this->images->create([
                    'image' => $path,
                    'product_id' => $products->id,
                ]);
                $images->save(); 
            }
        }
    }
    public function webView()
    {
        return [
            'mens' => $this->products->where([['category_id',1],['sale','<',50]])->orderBy('created_at', 'desc')->limit(4)->get(),
            'womens' => $this->products->where([['category_id',2],['sale','<',50]])->orderBy('created_at', 'desc')->limit(4)->get(),
            'hot_deal' => $this->products->where('hot_deal',1)->first(),
            'selling_products_mens' => $this->products->where([['sale',50],['category_id',1]])->limit(4)->get(),
            'selling_products_womens' => $this->products->where([['sale',50],['category_id',0]])->limit(4)->get(),
            'product_sold' => $this->products->orderBy('created_at', 'desc')->limit(3)->get(),
        ];
    }

    public function search($request)
    {
        $key = $request['search'];
        $products =  $this->products->where('name','LIKE','%'.$key.'%')->paginate(5);
        return ['product' => $products, 'key' => $key];
    }

    public function updateProduct($request,$id)
    {
        $products = $this->products->findOrFail($id);
        $products->name = $request['name'];
        $products->price = $request['price'];
        $products->user_id = $request['user_id'];
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images','public');
            $products->image = $path;
        }
        $products->update();
    }

    public function deleteProduct($id)
    {
        $products = $this->products->findOrFail($id);
        $products->delete();
    }

    public function upImage($request,$id)
    {
        $images = $this->images->findOrFail($id);
        
        $images->save();
    }

    public function imageDelete($id)
    {
        $image = $this->images->findOrFail($id);
        $image->delete();
    }

    public function getSold()
    {
        return ($this->products->orderBy('sold', 'desc')->limit(6)->get());
           
        
    }
    public function imageStore($request)
    {
        if( $request->hasFile('images')){
            foreach($request->images as $item){
                $path = $item->store('images','public');
                $images = $this->images->create([
                    'image' => $path,
                    'product_id' => $request['id_product'],
                ]);
                $images->save(); 
            }
        }
    }
}