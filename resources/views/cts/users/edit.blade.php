@extends('cts.layouts.app')

@section('title','Chỉnh Sửa')

@section('content')
<div class="container" style="width:100% ;margin-top: 100px;">
    <form action="{{ route('cts.user.update',$user['id']) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-group col-12">
            <div class="input-group">
                <div class="custom-file">
                    <label class="custom-file-label" for="inputFile">Sửa Ảnh</label>
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
                <label for="inputFile" style="width:25%">
                    <img class="w-25  img"  style="width:100% !important" src="{{$user['image']}}" alt="">
                </label>
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

</script>
@endsection