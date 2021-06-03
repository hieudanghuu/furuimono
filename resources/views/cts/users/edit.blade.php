@extends('cts.layouts.app')

@section('title','Sửa Avatar')

@section('content')
<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('cts.user.update',$user['id']) }}" method="post" enctype="multipart/form-data" >
        @csrf
        {{-- <div>
            <label for="">Avata</label><br>
            <label for="image">
                @if (isset($user['profile_photo_path']))
                <img id="img"  src="{{asset('/storage/'.$user['profile_photo_path'])}}" style="width:200px" alt="No Vailable">
                @endif
            </label><br>
            <label for="image" class="btn btn-default btn-sm">change image</label>
            <span id="text_image"></span>
            <input accept=".jpg, .jpeg, .png" type="file" style="visibility:hidden;" class="form-control" id="image" onchange="change(this.value)" name="image">
        </div> --}}
        <div class="form-group col-12">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputFile">Choose file</label>
                    <input type="file" name="image"
                           class="custom-file-input @error('image') is-invalid @enderror"
                           id="inputFile" value="{{$user['image']}}">
                </div>
            </div>
            @error('image')
            <p class="text-danger">{{ $errors->first('image') }}</p>
            @enderror
            <div class="mt-2">
                @if (!empty($user['image']))
                    <img class="w-25 img" src="{{$user['image']}}" alt="">
                @endif
            </div>
        </div>
        <div>
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $user['name'] }}">
            @error('name')
                <div class=" text-danger">{{ $message }}</div>
            @enderror
            </div>
        <div>
            <label for="">Email</label>
            <p  class="form-control" >{{ $user['email'] }}</p>
        </div>
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
    // function change(value){
    //     document.getElementById('img').style.display = 'none';
    //     document.getElementById('text_image').innerHTML = value;
    // }
    $('#inputFile').on('change', function () {
            if (typeof (FileReader) != "undefined") {
                var image_holder = $(".img");
                image_holder.empty();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.img').attr('src', e.target.result);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("This browser does not support FileReader.");
            }
        })
</script>
@endsection