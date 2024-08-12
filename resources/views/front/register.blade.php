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
 
 
    {{show_alert()}}
 
 <!-- Log-in  -->
 <section class="position-relative pb-0">
    <div class="gen-login-page-background" style=""></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <form name="pms_login" id="pms_register-form" class="pms-form"  action="{{url('/register/user/cek')}}" method="post">
                        @csrf  
                         @method('POST')
                        <h4>Daftar </h4>
                      
                    <ul class="pms-form-fields-wrapper pl-0">
                        <li class="pms-field pms-user-login-field ">
                            <label for="pms_user_login">Username *</label>
                            <input id="usernameId" name="username" type="text" required>
                            <span id="username-feedback"></span>
                        </li>
                        <li class="pms-field pms-user-email-field ">
                            <label for="pms_user_email">E-mail *</label>
                            <input id="pms_user_email" name="email" type="text" required>
                            <span id="email-feedback"></span>

                        </li>
                        <li class="pms-field pms-first-name-field ">
                            <label for="pms_first_name">Nama Lengkap</label>
                            <input id="pms_first_name" name="nama" type="text" required>
                        </li>
                        <li class="pms-field pms-first-name-field ">
                            <label for="pms_first_name">Tanggal Lahir</label>
                            <input  name="umur" type="date" value="{{date('Y-m-d')}}" required>
                        </li>
                        
                        <li class="pms-field pms-pass1-field">
                            <label for="pms_pass1">Password *</label>
                            <input id="pms_pass1" name="password" type="password" required>
                        </li>
                       <li class="pms-field pms-pass1-field">
                            <button type="submit" style="margin-top:30px">Daftar</button>
                       </li>
                    </ul>
                    
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('#usernameId').on('input', function() {
                                var username = $(this).val();
                    
                                if (username.length > 0) {
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                        url: '/check-username',
                                        method: 'GET',
                                        data: { username: username },
                                        success: function(response) {
                                            if (response.exists) {
                                                $('#username-feedback').text('Username is already taken').css('color', 'red');
                                            } else {
                                                $('#username-feedback').text('Username is available').css('color', 'green');
                                            }
                                        },
                                        error: function() {
                                            $('#username-feedback').text('Error checking username').css('color', 'red');
                                        }
                                    });
                                } else {
                                    $('#username-feedback').text('');
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Log-in  -->

<!-- Back-to-Top start -->
<div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
</div>
<!-- Back-to-Top end -->

<script src="{{asset('front/js/asyncloader.min.js')}}"></script>
<!-- JS bootstrap -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- owl-carousel -->
<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
<!-- counter-js -->
<script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>
<!-- popper-js -->
<script src="{{asset('front/js/popper.min.js')}}"></script>
<script src="{{asset('front/js/swiper-bundle.min.js')}}"></script>
<!-- Iscotop -->
<script src="{{asset('front/js/isotope.pkgd.min.js')}}"></script>

<script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('front/js/slick.min.js')}}"></script>

<script src="{{asset('front/js/streamlab-core.js')}}"></script>

<script src="{{asset('front/js/script.js')}}"></script>