@extends('cts.layouts.app')

@section('title','Đơn Hàng')

@section('content')
<div class="container" style="width:100% ;margin-top: 70px;">
    <div class="d-flex justify-content-between">
        {{-- <a href="{{route('order.create')}}" class="btn btn-round btn-fill btn-info ml-3 h-100 ">Tạo Sản Phẩm</a> --}}
        <form class="navbar-form " action="{{route('order.search')}}">
            <div class="input-group no-border">
              <input type="text" name="search" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div> 
        </form>
    </div>
    <div class="card">
        <div class="card-header card-header-warning">
          <h4 class="card-title">Danh Sách Đơn Hàng</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>STT</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Người Tạo</th>
                    <th>Tên Người Nhận</th>
                    <th></th>          
                    <th></th>
                </thead>
                <tbody>
                    @if (count($orders) > 0) 
                        @foreach ($orders as $key => $item)
                            <tr>
                                <td >{{ $key += 1 }}</td>
                                <td>
                                    {{-- {{dd($item->product)}} --}}
                                    @foreach ($item->product as $product)
                               
                                    <div>
                                        <p style="margin:0"> {{$product['name']}}</p>
                                    </div>
                                    @endforeach
                                </td>
                                <td>{{$item->user['name']}}</td>
                                <td>{{$item['name']}} </td>
                                <td>
                                    @if ($item['status'] == 1)
                                    <a href="{{route('order.setStatusOrder',$item['id'])}}" class="btn btn-success btn-sm">chưa giao</a>
                                    @else
                                    <a href="{{route('order.setStatusOrder',$item['id'])}}" class="btn btn-danger btn-sm">giao thành công</a>
                                    @endif
                                </td>
                                <td>
                                    <a  rel="tooltip" title="Xóa" class=" btn-link btn-sm" href="{{ route('order.delete',$item['id'])}}"  onclick="return confirm('có muốn xóa không? hỏi thiệt (^.^)')" ><i class="far fa-trash-alt "></i></a>
                                    <a rel="tooltip" title="Sửa" href="{{ route('order.edit', $item['id']) }}" class="mr-2"><i class="far fa-edit"></i></a>
                                    <a rel="tooltip" title="Xem" href="{{ route('order.view', $item['id']) }}" class="mr-2"><i class="far fa-eye"></i></a>
                                    {{-- <a rel="tooltip" title="Xem Ảnh" href="{{ route('order.image', $item['id'])}}" class="mr-2"><i class="far fa-images"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    @else 
                    {{-- {{dd($search)}} --}}
                        @if (isset($search))
                        <p class="text-danger text-center">"{{$search}}" not found</p>
                        @else
                        <p class="text-danger text-center">No Data</p>
                        @endif
                    @endif    
                </tbody>
            </table>
        </div>
    </div>
    <div>
        {{ $orders->links() }}
    </div>
</div>

@endsection
    