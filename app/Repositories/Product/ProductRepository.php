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
            'status' => $request['status'],
            'user_id' =>Auth::user()->id,
       
        ]);

        // dd($products);
        if($request->hasFile('image') ){    
            $image = base64_encode(file_get_contents($request->file("image")));
            $products['image'] = "data:image/jpg;base64," . $image;  
        }
        $products->save();
        if( $request->hasFile('images')){
            foreach($request->images as $item){
                $image = base64_encode(file_get_contents($item));
                $path = "data:image/jpg;base64," . $image;
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
        $products->status = $request['status'];
        $products->discription = $request['discription'];
        $products->user_id = $request['user_id'];
        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file("image")));
            $products['image'] = "data:image/jpg;base64," . $image;  
        }
        $products->update();
    }

    public function deleteProduct($id)
    {
        $products = $this->products->findOrFail($id);
        $products->delete();
    }

    public function upImage($request)
    {
        
        // $id = $request['id'];
        // dd(is_string($id));
        // $images = $this->images->findOrFail($id);
        // if($request->hasFile("images" + $id)){
        //     $image = base64_encode(file_get_contents($request["images" + $id]));
        //     $images['image'] = "data:image/jpg;base64," . $image;  
        // }
        // $images->save();
        dd($request);
        if( $request->hasFile('images')){
            foreach($request->images as $item){
                $image = base64_encode(file_get_contents($request->file("image")));
                $path = "data:image/jpg;base64," . $image;
                $images = $this->images->create([
                    'image' => $path
                ]);
                $images->update(); 
            }
        }
    }

    public function imageDelete($id)
    {
        $image = $this->images->findOrFail($id);
        $image->delete();
    }
    public function deleteAllImage($id){
        
        foreach($this->images->all() as $item){
            if($item['product_id'] == $id){
                $item->delete();
            }
        }
    }

    public function getSold()
    {
        return ($this->products->orderBy('sold', 'desc')->limit(6)->get());
           
        
    }
    public function imageStore($request)
    {
        if( $request->hasFile('images')){
            foreach($request->images as $item){
                // $path = $item->store('images','public');
                $image = base64_encode(file_get_contents($item));
                $path = "data:image/jpg;base64," . $image;
                $images = $this->images->create([
                    'image' => $path,
                    'product_id' => $request['id_product'],
                ]);
                $images->save(); 
            }
        }
    }
}