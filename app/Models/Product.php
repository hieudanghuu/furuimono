<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','price','active','user_id','discription','image','status'];


    const PRODUCT_ACTIVE = 1; // sản phẩm đã bán
    const PRODUCT_UNACTIVE = 0; // sản phẩm chưa bán
    const SOLD = 0; 
    const NOT_SOLD = 1; 

    public function order(){
        return $this->belongsToMany(Order::class,"order_products","product_id","order_id");
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function picture(){
        return $this->hasMany('App\Models\Picture');
    }
    public function orderProduct(){
        return $this->hasMany('App\Models\OrderProduct');
    }
}


