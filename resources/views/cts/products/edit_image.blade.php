@extends('dashboards.layouts.app')

@section('title','EditProduct_image')

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
    <a href="{{route('dashboard.product.image.create',$product['id'])}}" class="btn btn-success">Create Secondary Photo</a> <br>
    @if (count($product->picture) > 0)
        @foreach ($product->picture as $key => $item)
            <form class="mt-3" action="{{ route('dashboard.product.image.update',$item['id']) }}"  method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">  
                    <div class="col-2">
                        <label for="image{{$item['id']}}">
                            <img class="img_custom" id="img{{$item['id']}}" src="{{asset('/storage/'.$item['image'])}}" width="100%" alt="product_image">
                            <label for="" id="text_image{{$item['id']}}"></label>
                        </label>
                        {{-- {{  $serializeArray = [$product['id'],$item['id']]  }}  --}}
                        {{-- {{dd([$product['id'],$item['id'] ])}} --}}
                        <input accept=".jpg, .jpeg, .png" type="file" hidden class="form-control" id="image{{$item['id']}}" onchange="change(this.value,{{$item['id']}})" name="images{{$item['id']}}">
                        <a data-toggle="modal" data-target="#exampleModal{{$item['id']}}"   class="btn btn-default btn-close-img">X</a>
                        <div class="modal fade" id="exampleModal{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{route('dashboard.product.image.delete')}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="id" value="{{$item['id']}}">
                                        <input type="text" hidden  name="product_id" value="{{$product['id']}}">
                                        <button type="submit"  class="btn btn-primary">OK</button>
                                    </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        <button class="btn btn-primary button_img {{$item['id']}}" id="edit{{$item['id']}}" ><i class="far fa-edit"></i></button>
                    </div>
                </div>
            </form>
        @endforeach
    @else
    <p class="text-danger text-center"> No Data</p>
    @endif
    
    <a href="{{route('dashboard.product.list')}}" class="btn btn-default">Back</a>
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