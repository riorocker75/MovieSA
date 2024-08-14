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

 


@endsection