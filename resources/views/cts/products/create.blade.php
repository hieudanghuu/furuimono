@extends('cts.layouts.app')

@section('title','Tạo Mới Sản Phẩm')

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
    <form action="{{ route('cts.product.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div>
            <label for="image" class="btn btn-default btn-sm">Thêm Ảnh Cho Sản Phẩm</label>
            <span id="text_image"></span>
            <input accept=".jpg, .jpeg, .png" type="file" style="visibility:hidden;" class="form-control" id="image" onchange="change(this.value,this.id)" name="image" required>
        </div>
        <div>
            <label for="images" class="btn btn-default btn-sm">
                Secondary Photo</label><span><i class="far fa-check-circle" id="icon_check"  ></i></span>
            <input accept=".jpg, .jpeg, .png" type="file" style="visibility:hidden;" class="form-control" id="images" onchange="change(this.value,this.id)"  name="images[]" multiple>
        </div>
        <div>
            <label for="">Tên Sản Phẩm</label>
            <input type="text" class="form-control" name="name" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="">Giá</label>
            <input type="text" class="form-control" name="price" required>
            @error('price')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="">Mô Tả Sản Phẩm</label>
            <input type="text" class="form-control" name="discription" required>
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    function change(value,id){
        console.log(id);
        if(id === 'images'){
            document.getElementById('icon_check').style.display = 'inline';
        }else document.getElementById('text_' + id).innerHTML = value;
    }
  
</script>
@endsection