@extends('cts.layouts.app')

@section('title','Sửa Đơn Hàng')

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
@foreach ($order->product as $item)
    <div class="container row" style="width:100% ;margin-top: 100px;">
        <div class="col-3">
            <div class="text-center">
                <label for="image text-center custom-image-product">
                    @if (isset($item['image']))
                        <img id="img"  src="{{$item['image']}}" alt="No Vailable">
                    @endif
                </label><br>  
            </div>
        </div>
        <div class="col-9">
            <div>
                <label for="">Tên Sản Phẩm</label>
                <label type="text" class="form-control">{{ $item['name'] }}</label>
            </div>
            <div>
                <label for="">Gía</label>
                <label type="text" class="form-control">{{ $item['price'] }}</label>
            </div>
            <div>
                <label for="">Tình Trạng (%)</label>
                <label type="text" class="form-control">{{ $item['status'] }}</label>
            </div>
            <div>
                <label for="">Mô Tả</label>
                <label type="text" class="form-control">{{ $item['discription'] }}</label>
            </div>
            <div>
                <form action="{{route('order.delete_product')}}" method="POST">
                    @csrf
                    <input type="text" hidden name="product_id" value="{{$item['id']}}">
                    <input type="text" hidden name="order_id" value="{{$order['id']}}">
                    <button  type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
@endforeach


<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('order.update')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div>
            <label for="">Tên Khách Hàng</label>
            <input type="text" class="form-control" name="name" value="{{$order['name']}}" required>
            <input type="text" name="product_id" value="{{$product['id']}}" hidden id="">
            <input type="text" name="order_id" value="{{$order['id']}}" hidden>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Địa Chỉ</label>
            <input type="text" class="form-control" name="address" value="{{$order['address']}}" required>
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Điện Thoại</label>
            <input type="text" class="form-control" name="phone" value="{{$order['phone']}}" required>
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="">
            <label for="">Ghi Chú</label>
            <input type="text" class="form-control" name="note" value="{{$order['note']}}" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div  class="form-group">
            <label for="">Người Tạo</label><br>
            <select class="form-control" name="user_id" >
                @foreach ($users as $item)
                <option value="{{ $item['id']}}" {{$product->user['name'] == $item['id']?'selected':''}}>{{ $product->user['name']}}</option>
                @endforeach
            </select>
        </div>
        {{-- {{dd($products)}} --}}
        <div  class="form-group mb-5">
            <label for="">Thêm Sản Phẩm</label><br>
            <select class="form-control" name="product" >
                <option value="0" selected>không chọn</option>
                @foreach ($products as $item)
                <option value="{{ $item['id']}}">{{$item['name']}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary ">Lưu </button>
        <a href="javascript:history.go(-1)" class="btn btn-default">Trở Lại</a>
    </form>
</div>
@endsection