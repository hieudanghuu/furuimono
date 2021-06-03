@extends('dashboards.layouts.app')

@section('title','CreateProduct_image')

@section('content')

<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{route('dashboard.product.image.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="image" class="btn btn-success">Up Image</label>
        <span id="text_image"></span><br>
        <input type="file" id="image" name="images[]" multiple hidden onchange="change(this.value)">
        <input type="text" name="id_product" value="{{$product['id']}}"  hidden >
        <button class="btn btn-primary">Submit</button>
        <a href="javascript:history.go(-1)" class="btn btn-default">Back</a>
    </form>
    
</div>
<script>    
    function change(value){  
        document.getElementById('text_image').innerHTML = value;
    }
</script>
@endsection