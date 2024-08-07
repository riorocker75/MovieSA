<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>MovieSA</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Flat Able is trending dashboard template made using Bootstrap 5 design framework. Flat Able is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
  <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
  <meta name="author" content="phoenixcoded">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- [Favicon] icon -->
  <link rel="icon" href="{{asset('/admin/assets/images/favicon.svg" type="image/x-icon')}}">
  <!-- [Google Font : Public Sans] icon -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{asset('/admin/assets/fonts/tabler-icons.min.css')}}" >
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="{{asset('/admin/assets/fonts/feather.css')}}">
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="{{asset('/admin/assets/fonts/fontawesome.css')}}">
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="{{asset('/admin/assets/fonts/material.css')}}">
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{asset('/admin/assets/css/style.css')}}" id="main-style-link" >
  <link rel="stylesheet" href="{{asset('/admin/assets/css/style-preset.css')}}" >

</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    <div class="loader-bg">
        <div class="pc-loader">
          <div class="loader-fill"></div>
        </div>
      </div>


      @if(Session::get('level') == '1')
        @include('layouts/side_admin')
      @endif



        <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">

      @yield('content')

    </div>
    </div>





 <!-- [Page Specific JS] start -->
 <script src="{{asset('/admin/assets/js/plugins/apexcharts.min.js')}}"></script>
 <script src="{{asset('/admin/assets/js/pages/dashboard-default.js')}}"></script>
 <!-- [Page Specific JS] end -->
 <!-- Required Js -->
 <script src="{{asset('/admin/assets/js/plugins/popper.min.js')}}"></script>
 <script src="{{asset('/admin/assets/js/plugins/simplebar.min.js')}}"></script>
 <script src="{{asset('/admin/assets/js/plugins/bootstrap.min.js')}}"></script>
 <script src="{{asset('/admin/assets/js/fonts/custom-font.js')}}"></script>
 <script src="{{asset('/admin/assets/js/pcoded.js')}}"></script>
 <script src="{{asset('/admin/assets/js/plugins/feather.min.js')}}"></script>

 



    </body>
    <!-- [Body] end -->
    
    </html>