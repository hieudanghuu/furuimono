@extends('dashboards.layouts.app')

@section('title','EditUser')

@section('content')
<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('dashboard.user.update',$user['id']) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div>
            <label for="">Avata</label><br>
            <label for="image">
                @if (isset($user['profile_photo_path']))
                <img id="img"  src="{{asset('/storage/'.$user['profile_photo_path'])}}" style="width:200px" alt="No Vailable">
                @endif
            </label><br>
            <label for="image" class="btn btn-default btn-sm">change image</label>
            <span id="text_image"></span>
            <input accept=".jpg, .jpeg, .png" type="file" style="visibility:hidden;" class="form-control" id="image" onchange="change(this.value)" name="image">
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
    function change(value){
        document.getElementById('img').style.display = 'none';
        document.getElementById('text_image').innerHTML = value;
    }
  
</script>
@endsection