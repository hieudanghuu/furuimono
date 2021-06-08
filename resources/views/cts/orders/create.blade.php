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
</style>
<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div>
            <label for="">Tên Khách Hàng</label>
            <input type="text" class="form-control" name="name" required>
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
        <div>
            <label for="">Ghi Chú</label>
            <input type="text" class="form-control" name="note" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection