<!DOCTYPE html>
<html lang="en">

<head>
    <title>MovieSA</title>
   <meta charset="utf-8">
   <meta name="keywords" content="MovieSA" />
   <meta name="description" content="MovieSA" />
   <meta name="author" content="" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title> MovieSA - Video Streaming </title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{asset('/front/images/favicon.ico')}}">
   <!-- CSS bootstrap-->
   <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}" />
   <!--  Style -->
   <link rel="stylesheet" href="{{asset('/front/css/style.css')}}" />
   <!--  Responsive -->
   <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}" />
   <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
   
   <script src="{{asset('/front/js/jquery-3.6.0.min.js')}}"></script>
   <script src="{{asset('/js/custom.js')}}"></script>

</head>

<body>
   <input type="hidden" id="cookie_log" name="cookie_log" value="{{Session::get('login-user')}}">
   {{show_alert()}}

    @include('layouts/front_header')


    @yield('content')






















 <!-- Back-to-Top start -->
 <div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
 </div>
 <!-- Back-to-Top end -->

 <!-- js-min -->
 <script src="{{asset('/front/js/asyncloader.min.js')}}"></script>
 <!-- JS bootstrap -->
 <script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
 <!-- owl-carousel -->
 <script src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
 <!-- counter-js -->
 <script src="{{asset('/front/js/jquery.waypoints.min.js')}}"></script>
 <script src="{{asset('/front/js/jquery.counterup.min.js')}}"></script>
 <!-- popper-js -->
 <script src="{{asset('/front/js/popper.min.js')}}"></script>
 <script src="{{asset('/front/js/swiper-bundle.min.js')}}"></script>
 <!-- Iscotop -->
 <script src="{{asset('/front/js/isotope.pkgd.min.js')}}"></script>

 <script src="{{asset('/front/js/jquery.magnific-popup.min.js')}}"></script>

 <script src="{{asset('/front/js/slick.min.js')}}"></script>

 <script src="{{asset('/front/js/streamlab-core.js')}}"></script>

 <script src="{{asset('/front/js/script.js')}}"></script>
<script>
 $(document).ready(function() {
        $('.favorite-toggle').click(function() {
            var button = $(this);
            var movieId = button.data('movie-id');
            var log_user= $('#cookie_log').val();
            if(log_user === ""){
               alert('You must log in to add this movie to your favorites.');
                    // Optionally, redirect to the login page:
                    window.location.href = '{{ url("/login") }}';
            }else{
            $.ajax({
                url: '{{ url("favorite/toggle") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    movie_id: movieId
                },
                success: function(response) {
                  if(response.status === 'added') {
                        button.find('i').addClass('fRed');
                    } else if(response.status === 'removed'){
                        button.find('i').removeClass('fRed');
                    }
                }
            });
         }
        });
    });

    

</script>

</body>

</html>