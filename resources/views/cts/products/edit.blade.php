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
        {{-- <div>
            {{dd($product['image'])}}
            <label for="">Ảnh Sản Phẩm</label><br> 
            <label for="image">
                @if (isset($product['image']))
                <img id="img"  src="{{asset('/storage/'.$product['image'])}}" style="width:200px" alt="No Vailable">
                @endif
            </label><br>
            <label for="image" class="btn btn-default btn-sm">Change Image</label>
            <span id="text_image"></span>
            <input accept=".jpg, .jpeg, .png" type="file" style="visibility:hidden;" class="form-control" id="image" onchange="change(this.value)" name="image">
        </div> --}}
        {{-- <div class="row">
            @foreach ($product->picture as $key => $item)
            <div class="col-2">
                <label for="image{{$key}}">
                    <img class="img_custom" id="{{$key}}" src="{{asset('/storage/'.$item['image'])}}" width="100%" alt="product_image">
                </label>
                <input accept=".jpg, .jpeg, .png" type="file" style="visibility:hidden;" class="form-control" id="image{{$key}}" value="{{$item['image']}}" onchange="change(this.value)" name="images[]">
                <a href="#" id="close{{$key}}" onclick="close_img({{$key}})" class="btn btn-default btn-close-img">X</a>
            </div>
            @endforeach
        </div> --}}
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
            <input type="text" class="form-control" value="{{ $product['name'] }}" name="name">
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
            </div>
        <div>
            <label for="">Giá</label>
            <input type="text" class="form-control" value="{{ $product['price'] }}" name="price">
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Mô Tả </label>
            <input type="text" class="form-control" value="{{ $product['discription'] }}" name="discription">
            @error('quanty')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Tình Trạng (%)</label>
            <input type="text" class="form-control" value="{{ $product['status'] }}" name="status">
            @error('quanty')
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