@extends('cts.layouts.app')

@section('title','Trang Chủ')

@section('content')
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('cts.user.list')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="far fa-user"></i>
                  </div>
                  <p class="card-category">Thành Viên</p>
                  <h3 class="card-title">{{$sumUser}}
                  </h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('cts.product.list')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Kho</p>
                  <h3 class="card-title">{{$sumProduct}}</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="#" style="margin-bottom: 30px">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-yen-sign"></i>
                  </div>
                  <p class="card-category">Thu Nhập</p>
                  <h3 class="card-title"> 
                    {{$total}}</h3>
                </div>
              </a>  
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('order.list')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fal fa-shopping-cart"></i>
                  </div>
                  <p class="card-category">Tổng Đơn Hàng</p>
                  <h3 class="card-title">{{$sumOrder}}</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('cts.product.list')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-secondary card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-archive"></i>
                  </div>
                  <p class="card-category">Tổng Sản Phẩm</p>
                  <h3 class="card-title">{{$products}}
                  </h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('cts.productDone')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-secondary card-header-icon">
                  <div class="card-icon">
                    <i class="fal fa-archive"></i>
                  </div>
                  <p class="card-category">Sản Phẩm Đã Bán</p>
                  <h3 class="card-title">{{$doneProduct}}</h3>
                </div>
              </a> 
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('order.list')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-box"></i>
                  </div>
                  <p class="card-category">Đơn Hàng Đang Đợi</p>
                  <h3 class="card-title"> 
                    {{$order}}</h3>
                </div>
              </a>  
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <a href="{{route('order.orderDone')}}" style="margin-bottom: 30px">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fas fa-box-check"></i>
                  </div>
                  <p class="card-category">Đơn Hàng Hoàn Thành</p>
                  <h3 class="card-title">{{$doneOrder}}</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
    
