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


    const PRODUCT_ACTIVE = 1;
    const PRODUCT_UNACTIVE = 0;

    public function product(){
        return $this->belongsToMany(Order::class,"order_products","product_id","order_id");
    }
    public function user(){
        return $this->belongsTo('App\Models\user');
    }
    public function picture(){
        return $this->hasMany('App\Models\Picture');
    }
}


