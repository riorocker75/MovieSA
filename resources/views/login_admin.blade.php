


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
  <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
   
  <script src="{{asset('/front/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('/js/custom.js')}}"></script>
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  {{show_alert()}}
    
  <div class="loader-bg">
        <div class="pc-loader">
          <div class="loader-fill"></div>
        </div>
      </div>

      <div class="auth-main v1">
        
        <div class="bg-overlay bg-white"></div>
        <div class="auth-wrapper">
          <div class="auth-form">
            {{-- <a href="../index.html" class="d-block mt-5"><img src="../admin/assets/images/logo-white.svg" alt="img"></a> --}}
            <div class="card mb-5 mt-3">
              <div class="card-header bg-dark">
                <h4 class="text-center text-white f-w-500 mb-0">Silahkan Login</h4>
              </div>
              <form action="{{ url('/login/admin/cek') }}" method="post">
                @csrf  
                @method('POST')
              <div class="card-body">
                <div class="form-group mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                </div>
                <div class="form-group mb-3">
                  <input type="password" class="form-control" id="floatingInput1" placeholder="Password" name="password">
                </div>
                {{-- <div class="d-flex mt-1 justify-content-between align-items-center">
                  <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                    <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                  </div>
                </div> --}}
                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
            </form>
             
            </div>
          </div>
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