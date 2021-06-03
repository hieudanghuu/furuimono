@extends('dashboards.layouts.app')

@section('title','ViewProduct')

@section('content')
<div class="container row" style="width:100% ;margin-top: 100px;">
    <div class="col-6">
        <div class="text-center">
            {{-- {{dd($product['image'])}} --}}
           
            <label for="image text-center">
                @if (isset($product['image']))
                <img id="img"  src="{{asset('/storage/'.$product['image'])}}" style="width:410px;margin-left: -4px;" alt="No Vailable">
                @endif
            </label><br>  
            {{-- {{dd($product->picture)}} --}}
            @if (count($product->picture)>0)
            <div class="d-flex justify-content-center">
                @foreach ($product->picture as $key => $item)
                    <label >
                        <img class="img_custom" id="img{{$item['id']}}" src="{{asset('/storage/'.$item['image'])}}" width="100px" alt="product_image">
                        <label for="" id="text_image{{$item['id']}}"></label>
                    </label>
                @endforeach
            </div>
            @endif      
        </div>
    </div>
    <div class="col-6">
        <div>
            <label for="">Name</label>
            <label type="text" class="form-control">{{ $product['name'] }}</label>
        </div>
        <div>
            <label for="">Price</label>
            <label type="text" class="form-control">{{ $product['price'] }}</label>
        </div>
        <div>
            <label for="">Product_Code</label>
            <label type="text" class="form-control">{{ $product['product_code'] }}</label>
        </div>
        <div>
            <label for="">Quanty</label>
            <label type="text" class="form-control">{{ $product['quanty'] }}</label>
        </div>
        <div>
            <label for="">Sale</label>
            <label type="text" class="form-control">{{ $product['sale'] }} %</label>
        </div>
        <div  class="form-group">
            <label for="">Category</label><br>
            <label type="text" class="form-control">
                @foreach ($categories as $item)
                {{$product['category_id'] == $item['id']?$item['name']:null}}
                @endforeach
            </label>
        </div>
        <a href="javascript:history.go(-1)" class="btn btn-default">Back</a>
    </div>
</div>
@endsection