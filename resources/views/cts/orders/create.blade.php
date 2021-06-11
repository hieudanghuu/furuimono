@extends('cts.layouts.app')

@section('title','Tạo Mới Đơn Hàng')

@section('content')
<style>
    .btn.btn-default.btn-sm{
        margin-top: -5px;
    }
    .fa-check-circle{
        font-weight: 100;
        color: green;
        font-size: 24px;
        display: none;
    }
    #img{
        object-fit: cover;
        width: 100%;
        /* height: 400px; */
    }
</style>
<div class="container row" style="width:100% ;margin-top: 100px;">
    <div class="col-3">
        <div class="text-center">
            <label for="image text-center custom-image-product">
                @if (isset($product['image']))
                    <img id="img"  src="{{$product['image']}}" alt="No Vailable">
                @endif
            </label><br>  
        </div>
    </div>
    <div class="col-9">
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
  
     
    </div>
</div>
<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div>
            <label for="">Tên Khách Hàng</label>
            <input type="text" class="form-control" name="name" required>
            <input type="text" name="product_id" value="{{$product['id']}}" hidden id="">
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Địa Chỉ</label>
            <input type="text" class="form-control" name="address" required>
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Điện Thoại</label>
            <input type="text" class="form-control" name="phone" required>
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <label for="">Ghi Chú</label>
            <input type="text" class="form-control" name="note" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div  class="form-group mb-5">
            <label for="">Người Tạo</label><br>
            <select class="form-control" name="user_id" >
                @foreach ($users as $item)
                <option value="{{ $item['id']}}" {{$product->user['name'] == $item['id']?'selected':''}}>{{ $item['name']}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary ">Lưu </button>
        <a href="javascript:history.go(-1)" class="btn btn-default">Trở Lại</a>
    </form>
</div>
@endsection