<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset ('dashboard/assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset ('dashboard/assets/img/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  @include('cts.component.head')
</head>

<body class="">
  
  
    <div class="wrapper ">
      @include('cts.component.sidebar')
      <div class="main-panel">
        <!-- Navbar -->
        @include('cts.component.navbar')
        
        @yield('content')
        
        @include('cts.component.footer')
      </div>
   </div>

  @include('cts.component.script')
  
</body>

</html>