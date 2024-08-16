@extends('layouts.front_app')
@section('content')

 <!-- owl-carousel Banner Start -->
 <section class="pt-0 pb-0">
    <div class="container-fluid px-0">
       <div class="row no-gutters">
          <div class="col-12">
             <div class="gen-banner-movies banner-style-2">
                <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                   data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                   data-loop="true" data-margin="0">
                  @php
                      $mv_banner= \App\Models\Film::orderBy('id','desc')->limit(5)->get();
                  @endphp

                  @foreach ($mv_banner as $mvb)
                      
                   <div class="item" style="background: url('{{asset('/upload/'.$mvb->poster.'')}}')">
                      <div class="gen-movie-contain-style-2 h-100">
                         <div class="container h-100">
                            <div class="row flex-row-reverse align-items-center h-100">
                               <div class="col-xl-6">
                                  <div class="gen-front-image">
                                     <img src="{{asset('/upload/'.$mvb->poster.'')}}" alt="owl-carousel-banner-image">
                                     <a href="{{$mvb->trailer}}" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                           height="213.7px" viewBox="0 0 213.7 213.7"
                                           enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                           <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              points="
                                                          73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                           <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7"
                                              stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                              cx="106.8" cy="106.8" r="103.3">
                                           </circle>
                                        </svg>
                                        <span>Tonton Trailer</span>
                                     </a>
                                  </div>
                               </div>
                               <div class="col-xl-6">
                                  <div class="gen-tag-line"><span>New Upload</span></div>
                                  <div class="gen-movie-info">
                                     <h3>{{$mvb->judul}}</h3>
                                  </div>
                                  <div class="gen-movie-meta-holder">
                                     {{-- <ul class="gen-meta-after-title">
                                        <li class="gen-sen-rating">
                                           <span>
                                              12A</span>
                                        </li>
                                        <li> <img src="images/asset-2.png" alt="rating-image">
                                           <span>
                                              0 </span>
                                        </li>
                                     </ul> --}}
                                     <p>
                                       {!! substr($mvb->desc, 0, 100) !!}
                                     </p>
                                     <div class="gen-meta-info">
                                        <ul class="gen-meta-after-excerpt">
                                           <li>
                                              <strong>Cast :</strong>
                                              {{$mvb->cast}}
                                           </li>
                                           <li>
                                              <strong>Genre :</strong>
                                              <span>
                                                {{$mvb->genre}}
                                              </span>
                                              
                                           </li>
                                           <li>
                                              <strong>Tag :</strong>
                                              <span>
                                                {{$mvb->tag}}
                                              </span>
                                              
                                           </li>
                                        </ul>
                                     </div>
                                  </div>
                                  <div class="gen-movie-action">
                                     <div class="gen-btn-container">
                                        <a href="{{url('/user/movie/play/'.$mvb->slug.'')}}" class="gen-button .gen-button-dark">
                                           <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                              Now</span>
                                        </a>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                  @endforeach

                   {{-- end movie caroausel banner --}}

                   

                   
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- owl-carousel Banner End -->

 {{-- recomendation --}}
 @if (Session::get('login-user') == 1)
 <section class="gen-section-padding-2">
   <div class="container">
      <div class="row">
         <div class="col-xl-6 col-lg-6 col-md-6">
            <h4 class="gen-heading-title">Rekomendasi untuk Anda : {{Session::get('usr_username')}}</h4>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
            <div class="gen-movie-action">
               <div class="gen-btn-container text-right">
                  <a href="{{url('/movies/all')}}" class="gen-button gen-button-flat">
                     <span class="text">Lainya</span>
                  </a>
               </div>
            </div>
         </div>
      </div>
          
      <div class="row mt-3">
         <div class="col-12">
            <div class="gen-style-2">
               <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                  data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                  data-loop="false" data-margin="30">
                  
                  @foreach ($data_recom as $dr)
                  <div class="item">
                     <div
                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                           <div class="gen-movie-contain">
                              <div class="gen-movie-img">
                                 <img src="{{asset('/upload/'.$dr->poster.'')}}" alt="owl-carousel-video-image">
                                 <div class="gen-movie-add">
                                    <div class="wpulike wpulike-heart">
                                       <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                             type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                    </div>
                                    <ul class="menu bottomRight">
                                       <li class="share top">
                                          <i class="fa fa-share-alt"></i>
                                          <ul class="submenu">
                                             <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                             </li>
                                             <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                             </li>
                                             <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                             class="fa fa-plus"></i></a>
                                       <div class="dropdown-menu mCustomScrollbar">
                                          <div class="mCustomScrollBox">
                                             <div class="mCSB_container">
                                                <a class="login-link" href="register.html">Sign in to add this movie
                                                   to a
                                                   playlist.</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="gen-movie-action">
                                    <a href="{{url('/user/movie/play/'.$dr->slug.'')}}" class="gen-button">
                                       <i class="fa fa-play"></i>
                                    </a>
                                 </div>
                              </div>
                              <div class="gen-info-contain">
                                 <div class="gen-movie-info">
                                    <h3><a href="{{url('/user/movie/play/'.$dr->slug.'')}}">{{$dr->judul}}</a>
                                    </h3>
                                 </div>
                                 <div class="gen-movie-meta-holder">
                                    <ul>
                                       {{-- <li>2hr 00mins</li> --}}
                                       <li>
                                          <a href=""><span>{{$dr->genre}}</span></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- #post-## -->
                  </div>
                  @endforeach

                  
               </div>
            </div>
         </div>
      </div>


   </div>
</section>   
@endif
{{-- end recomendation --}}
 
{{-- Most Pupular --}}
@if (!$data_po->isEmpty())
    
<section class="gen-section-padding-2">
   <div class="container">
      <div class="row">
         <div class="col-xl-6 col-lg-6 col-md-6">
            <h4 class="gen-heading-title">Paling Populer</h4>
         </div>
         <div class="col-xl-6 col-lg-6 col-md-6 d-none d-md-inline-block">
            <div class="gen-movie-action">
               <div class="gen-btn-container text-right">
                 
               </div>
            </div>
         </div>
      </div>
          
      <div class="row mt-3">
         <div class="col-12">
            <div class="gen-style-2">
               <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                  data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="false"
                  data-loop="false" data-margin="30">
                  
                  @foreach ($data_po as $dp)
                  <div class="item">
                     <div
                        class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                        <div class="gen-carousel-movies-style-2 movie-grid style-2">
                           <div class="gen-movie-contain">
                              <div class="gen-movie-img">
                                 <img src="{{asset('/upload/'.$dp->poster.'')}}" alt="owl-carousel-video-image">
                                 <div class="gen-movie-add">
                                    <div class="wpulike wpulike-heart">
                                       <div class="wp_ulike_general_class wp_ulike_is_not_liked"><button
                                             type="button" class="wp_ulike_btn wp_ulike_put_image"></button></div>
                                    </div>
                                    <ul class="menu bottomRight">
                                       <li class="share top">
                                          <i class="fa fa-share-alt"></i>
                                          <ul class="submenu">
                                             <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                             </li>
                                             <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                             </li>
                                             <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                          </ul>
                                       </li>
                                    </ul>
                                    <div class="movie-actions--link_add-to-playlist dropdown">
                                       <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                             class="fa fa-plus"></i></a>
                                       <div class="dropdown-menu mCustomScrollbar">
                                          <div class="mCustomScrollBox">
                                             <div class="mCSB_container">
                                                <a class="login-link" href="register.html">Sign in to add this movie
                                                   to a
                                                   playlist.</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="gen-movie-action">
                                    <a href="{{url('/user/movie/play/'.$dp->slug.'')}}" class="gen-button">
                                       <i class="fa fa-play"></i>
                                    </a>
                                 </div>
                              </div>
                              <div class="gen-info-contain">
                                 <div class="gen-movie-info">
                                    <h3><a href="{{url('/user/movie/play/'.$dp->slug.'')}}">{{$dp->judul}}</a>
                                    </h3>
                                 </div>
                                 <div class="gen-movie-meta-holder">
                                    <ul>
                                       {{-- <li>2hr 00mins</li> --}}
                                       <li>
                                          <a href=""><span>{{$dp->genre}}</span></a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- #post-## -->
                  </div>
                  @endforeach

                  
               </div>
            </div>
         </div>
      </div>


   </div>
</section>
@endif


{{-- most viewed --}}


@endsection