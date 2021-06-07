@extends('cts.layouts.app')

@section('title','Chi Tiết')

@section('content')
<div class="container row" style="width:100% ;margin-top: 100px;">
    <div class="col-6">
        <div class="text-center">
            {{-- {{dd($product['image'])}} --}}
           
            <label for="image text-center">
                @if (isset($product['image']))
                <img id="img"  src="{{$product['image']}}" style="width:410px;margin-left: -4px;" alt="No Vailable">
                @endif
            </label><br>  
            {{-- {{dd($product->picture)}} --}}
            @if (count($product->picture)>0)
            <div class="d-flex justify-content-center">
                @foreach ($product->picture as $key => $item)
                    <label >
                        <img class="img_custom" id="img{{$item['id']}}" src="{{$item['image']}}" width="100px" alt="product_image">
                        <label for="" id="text_image{{$item['id']}}"></label>
                    </label>
                @endforeach
            </div>
            @endif      
        </div>
    </div>
    <div class="col-6">
        <div>
            <label for="">Tên Sản Phẩm</label>
            <label type="text" class="form-control">{{ $product['name'] }}</label>
        </div>
        <div>
            <label for="">Gía</label>
            <label type="text" class="form-control">{{ $product['price'] }}</label>
        </div>
        <div>
            <label for="">Tình Trạng (%)</label>
            <label type="text" class="form-control">{{ $product['status'] }}</label>
        </div>
        <div>
            <label for="">Mô Tả</label>
            <label type="text" class="form-control">{{ $product['discription'] }}</label>
        </div>
        <div  class="form-group">
            <label for="">Người Tạo</label><br>
            <select class="form-control"  name="user_id" >
                @foreach ($users as $item)
                <option value="{{ $item['id']}}" {{$product->user['name'] == $item['id']?'selected':''}}>{{ $product->user['name']}}</option>
                @endforeach
            </select>
        </div>
        <a href="javascript:history.go(-1)" class="btn btn-default">Back</a>
    </div>
</div>
@endsection