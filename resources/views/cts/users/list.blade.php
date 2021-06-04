@extends('cts.layouts.app')

@section('title','Thành Viên')

@section('content')
<style>
.profile-img{
    height: 100%;
    background-image: none;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    border-radius: 50%;
}
.customs-img{
    width: 50px;
    height: 50px;
    display: inline-block;
    vertical-align:top;
    margin: 5px;
    margin-left: 10px;
    border:none; 
}
</style>
<div class="container" style="width:100% ;margin-top: 70px;">

    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Danh Sách Thành Viên</h4>
            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th></th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($users)) 
                    @foreach ($users as $item)
                        <tr>
                            <td >
                              <div>
                                <img src="{{$item['image'] }}"
                                alt="image"
                                style="max-width: 50px">
                              </div>
                             
                            </td>
                            <td>{{ $item['name']}}</td>
                            <td>{{ $item['email']}}</td>
                            <td>
                            <a href="{{route('cts.user.delete',$item['id'])}}"  onclick="return confirm('có muốn xóa không? hỏi thiệt (^.^)')" class="mr-2"><i class="far fa-trash-alt "></i></a>
                                <a href="{{ route('cts.user.edit', $item['id']) }}" class="mr-2"><i class="far fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection
    