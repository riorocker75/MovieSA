<!--========== Header ==============-->
<header id="gen-header" class="gen-header-style-1 gen-has-sticky">
    <div class="gen-bottom-header">
       <div class="container">
          <div class="row">
             <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                   <a class="navbar-brand" href="#">
                      {{-- <img class="img-fluid logo" src="" alt="streamlab-image"> --}}
                   </a>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <div id="gen-menu-contain" class="gen-menu-contain">
                         <ul id="gen-main-menu" class="navbar-nav ml-auto">
                            <li class="menu-item active">
                               <a href="{{url('/')}}" aria-current="page">Home</a>
                             
                            </li>
                            <li class="menu-item">
                               <a href="{{url('/movies/all')}}">Movies </a>
                            </li>
                            <li class="menu-item">
                               <a href="{{url('/news/all')}}">News</a>
                            </li>
                            
                            {{-- <li class="menu-item">
                               <a href="{{url('/about')}}">About Us</a>
                            </li> --}}
                         </ul>
                      </div>
                   </div>
                   <div class="gen-header-info-box">
                      <div class="gen-menu-search-block">
                         <a href="javascript:void(0)" id="gen-seacrh-btn"><i class="fa fa-search"></i></a>
                         <div class="gen-search-form">
                            <form role="" method="get" class="search-form" action="{{url('/movie/search')}}">
                              @csrf
                              @method('GET')  
                              <label>
                                  <span class="screen-reader-text"></span>
                                  <input type="search" class="search-field" placeholder="Search …"  name="cari">
                               </label>
                               <button type="submit" class="search-submit"><span
                                     class="screen-reader-text"></span></button>
                            </form>
                         </div>
                      </div>
                      <div class="gen-account-holder">
                         <a href="javascript:void(0)" id="gen-user-btn"><i class="fa fa-user"></i></a>
                         <div class="gen-account-menu">
                            <ul class="gen-account-menu">
                              @if (!Session::get('login-user'))
                                  
                               <!-- Pms Menu -->
                               <li>
                                  <a href="{{url('/login')}}"><i class="fas fa-sign-in-alt"></i>
                                     login </a>
                               </li>
                               <li>
                                  <a href="{{url('/register')}}"><i class="fa fa-user"></i>
                                     Register </a>
                               </li>
                               @elseif(Session::get('login-user'))
                               <!-- Library Menu -->
                               <li>
                                 <a href="{{url('/dashboard/user/')}}"><i class="fa fa-home"></i>
                                   Dashboard</a>
                              </li>
                               <li>
                                  <a href="{{url('/dashboard/user/favorit/'.Session::get('user_id').'')}}"><i class="fa fa-list"></i>
                                    Favorit Movie </a>
                               </li>
                               <li>
                                 <a href="{{url('/logout')}}">
                                  <i class="fas fa-lock-open    "></i>
                                    Logout </a>
                              </li>
                              @endif

                            </ul>
                         </div>
                      </div>
                   
                   </div>
                   <button class="navbar-toggler" type="button" data-toggle="collapse"
                      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fas fa-bars"></i>
                   </button>
                </nav>
             </div>
          </div>
       </div>
    </div>
 </header>
 <!--========== Header ==============-->
