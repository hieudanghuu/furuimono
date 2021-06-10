<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ["order_id","product_id"];

    public function order(){
        return $this->belongsTo("App\Models\Order");
    }

    public function product(){
        return $this->belongsTo("App\Models\Product");
    }
}
