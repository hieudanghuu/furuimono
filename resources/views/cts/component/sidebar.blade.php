  <div class="sidebar" data-color="purple" data-background-color="white" data-image="/dashboard/assets/img/sidebar-1.jpg">
   
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        FURUMONO
      </a>
    </div>
    <div class="sidebar-wrapper">
      <?php
        if (\Request::route()->getName()) {
          $pageName = \Request::route()->getName();
        }
      ?>
      <ul class="nav">
        <li class="nav-item {{ strlen(strstr($pageName, 'home')) > 0 ?'active':''}}  ">
          <a class="nav-link" href="{{route('cts.home')}}">
            <i class="fas fa-home"></i>
            <p>Trang Chủ</p>
          </a>
        </li>
        <li class="nav-item {{ strlen(strstr($pageName, 'user')) > 0 ?'active':''}} ">
          <a class="nav-link" href="{{route('cts.user.list')}}">
            <i class="far fa-user"></i>
            <p>Thành Viên</p>
          </a>

        </li>
        <li class="nav-item {{ strlen(strstr($pageName, 'product')) > 0 ?'active':''}}">
          <a class="nav-link" href="{{route('cts.product.list')}}">
            <i class="fal fa-archive"></i>
            <p>Kho Hàng</p>
          </a>
        </li>
        <li class="nav-item {{ strlen(strstr($pageName, 'order')) > 0 ?'active':''}} ">
          <a class="nav-link" href="{{route('order.list')}}">
            <i class="fab fa-first-order-alt"></i>
            <p>Đơn Hàng</p>
          </a>
        </li>
        <li class="nav-item ">
          <form method="POST" style="padding: 16px 0; padding-left:32px ;margin-bottom: 0px;" action="{{ route('logout') }}">
            @csrf
            <x-jet-dropdown-link style="font-size: 14px; margin:0   ;  padding: 8px  14px!important;" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                            this.closest('form').submit();"><i style="margin-right: 0!important" class="fas fa-sign-out-alt"></i>
              Đăng Xuất
            </x-jet-dropdown-link>
        </form>
          
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="/dashboards">
            <i class="fal fa-cog"></i>
            <p>Cài Đặt</p>
          </a>
        </li>
      </ul>
    </div>
  </div>