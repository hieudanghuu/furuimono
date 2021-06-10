@extends('cts.layouts.app')

@section('title','Sản Phẩm')

@section('content')

<div class="container" style="width:100% ;margin-top: 70px;">
    <div class="d-flex justify-content-between">
        <div class="h-100">
            <a href="{{route('cts.product.create')}}" class="btn btn-round btn-fill btn-info">Tạo Sản Phẩm</a>
            <a href="{{route('cts.product.list')}}" class="btn btn-primary btn-round">Sản Phẩm Đã Bán</a>
        </div>
        
        <form class="navbar-form " action="{{route('cts.product.search')}}">
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
          <h4 class="card-title">Product List</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <th>STT</th>
                    <th>Sản Phẩm</th>
                    <th>Người Tạo</th>
                    <th>Tình Trạng</th>
                    <th>Giá</th>
                    <th></th>
                </thead>
                <tbody>
                    @if (count($products) > 0) 
                        @foreach ($products as $key => $item)
                            <tr>
                                <td >{{ $key += 1 }}</td>
                                <td >
                                    <div class="customs-img">
                                        @if ($item['image'])
                                        <img src="{{$item['image'] }}" width="100px" alt="image_product"><br>
                                        {{-- <img src="{{asset('storage/'.$item['image'])}}" width="100px" alt="image_product"> --}}
                                        {{-- <div class="profile-img" style="background-image:url({{asset('storage/'.$item['image'])}}); "></div> --}}
                                        @endif
                                        <span>{{ $item['name']}}</span>
                                    </div>
                                </td>
                                <td>{{$item->user['name']}}</td>
                               
                                <td>{{$item['status']}} %</td>
                                <td>{{$item['price']}}</td>
                                <td>
                                    @if ($item['active'] != App\Models\Product::PRODUCT_ACTIVE)
                                    <span class="btn btn-warning btn-sm">đã vào đơn</span>   
                                    @else
                                    <a href="{{route('order.create', $item['id'])}}" class="btn btn-success btn-sm ">Tạo Đơn Hàng</a> 
                                    @endif
                                </td>
                                

                                <td>
                                    
                                    <a  rel="tooltip" title="Xóa" class=" btn-link btn-sm" href="{{ route('cts.product.delete',$item['id'])}}"  onclick="return confirm('có muốn xóa không? hỏi thiệt (^.^)')" ><i class="far fa-trash-alt "></i></a>
                                    <a rel="tooltip" title="Sửa" href="{{ route('cts.product.edit', $item['id']) }}" class="mr-2"><i class="far fa-edit"></i></a>
                                    <a rel="tooltip" title="Xem" href="{{ route('cts.product.view', $item['id']) }}" class="mr-2"><i class="far fa-eye"></i></a>
                                    <a rel="tooltip" title="Xem Ảnh" href="{{ route('cts.product.image', $item['id'])}}" class="mr-2"><i class="far fa-images"></i></a>
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
        {{ $products->links() }}
    </div>
</div>
@endsection
    