@extends('cts.layouts.app')

@section('title','Sửa Sản Phẩm')

@section('content')
<style>
    .img_custom{
        position: relative;
    }
    .btn-close-img{
        position: absolute;
        top: -15px;
        right: 5px;
        border-radius: 50%;
        padding: 2px 6px;
    }
</style>
<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('cts.product.update',$product['id']) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-group col-12">
            <div class="input-group">
                <div class="custom-file">
                    <label class="custom-file-label btn btn-default btn-sm" for="inputFile">Sửa Ảnh</label>
                    <input type="file" name="image"
                           class="custom-file-input @error('image') is-invalid @enderror"
                           id="inputFile" value="{{$product['image']}}">
                </div>
            </div>
            @error('image')
            <p class="text-danger">{{ $errors->first('image') }}</p>
            @enderror
            <div class="mt-2">
                @if (!empty($product['image']))
                <label for="inputFile" style="width:25%">
                    <img class="w-25  img"  style="width:100% !important" src="{{$product['image']}}" alt="">
                </label>
                @endif
            </div>
        </div>
        <div>
            <label for="">Tên Sản Phẩm</label>
            <input type="text" class="form-control" value="{{ $product['name'] }}" name="name" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
            </div>
        <div>
            <label for="">Giá</label>
            <input type="number" class="form-control" value="{{ $product['price'] }}" name="price" required>
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Mô Tả </label>
            <input type="text" class="form-control" value="{{ $product['discription'] }}" name="discription" required>
            @error('discription')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Tình Trạng (%)</label>
            <input type="text" class="form-control" value="{{ $product['status'] }}" name="status" required>
            @error('status')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div  class="form-group">
            <label for="">Người Tạo</label><br>
            <select class="form-control"  name="user_id" >
                @foreach ($users as $item)
                <option value="{{ $item['id']}}" {{$product->user['name'] == $item['id']?'selected':''}}>{{ $product->user['name']}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Submit</button> <a href="javascript:history.go(-1)" class="btn btn-default">Back</a>
    </form>
</div>
<script>
    function change(value){
        console.log(value);
        
        document.getElementById('text_image').innerHTML = value;
        document.getElementById('img-1').style.display = 'none';
    }
    function close_img(id){
        document.getElementById(id).style.display= 'none';
        document.getElementById('image'+id).value= '';
        document.getElementById('close' + id).style.display= 'none';
    }
  
</script>
@endsection