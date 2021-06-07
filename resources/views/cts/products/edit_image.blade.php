@extends('cts.layouts.app')

@section('title','Sửa Ảnh Sản Phẩm')

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
    .button_img{
        position: absolute;
        top: -15px;
        right: -23px;
        border-radius: 50%;
        padding: 4px 6px;
    }
</style>
<div class="container" style="width:100% ;margin-top: 100px;">
    <a href="{{route('cts.product.image.create',$product['id'])}}" class="btn btn-success">Tạo Ảnh Phụ</a>
     <br>
    @if (count($product->picture) > 0)
    <a href="{{route('cts.product.image.deleteAllImage',$product['id'])}}" class="btn btn-danger">Xóa Hết Ảnh</a>
        @foreach ($product->picture as $key => $item)
            <div class="row">  
                <div class="col-4">
                    <label for="image{{$item['id']}}">
                        <img class="img_custom" id="img{{$item['id']}}" src="{{$item['image']}}" width="100%" alt="product_image">
                        <label for="" id="text_image{{$item['id']}}"></label>
                    </label>
                    <a  href="{{route('cts.product.image.destroy',$item['id'])}}" class="btn btn-default btn-close-img">X</a>
                </div>
            </div>
        @endforeach
    @else
    <p class="text-danger text-center">Không có dữ liệu</p>
    @endif
    <a href="{{route('cts.product.list')}}" class="btn btn-default">Trở Lại</a>
</div>
<script>
    function change(value,id){  
 
        document.getElementById('text_image'+id).innerHTML = value;
        document.getElementById('close'+id).style.display = 'none';
        document.getElementById('img'+id).style.display = 'none';
    }
    function close_img(id){
        document.getElementById('img'+id).style.display= 'none';
        document.getElementById('image'+id).value= '';
        document.getElementById('close' + id).style.display= 'none';
        document.getElementById('edit'+id).style.display = 'none';
    }
  
</script>
@endsection