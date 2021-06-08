<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["name","address","phone","note","status","user_id","product_id","total"];

    const ORDER_ACTIVE = 1;
    const ORDER_UNACTIVE = 0;

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function product(){
        return $this->belongsToMany("App\Models\Product","order_products","order_id","product_id");
    }
}
