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
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="far fa-user"></i>
                </div>
                <p class="card-category">Thành Viên</p>
                <h3 class="card-title">{{$sumUser}}
                </h3>
              </div>
              <div class="card-footer">
          
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Kho</p>
                <h3 class="card-title">{{$sumProduct}}</h3>
              </div>
              <div class="card-footer">
               
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="fas fa-yen-sign"></i>
                </div>
                <p class="card-category">Thu Nhập</p>
                <h3 class="card-title"></h3>
              </div>
              <div class="card-footer">
           
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="fal fa-shopping-cart"></i>
                </div>
                <p class="card-category">Đơn Hàng</p>
                <h3 class="card-title">{{$sumOrder}}</h3>
              </div>
              <div class="card-footer">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
    
