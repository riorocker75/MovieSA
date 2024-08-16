@extends('layouts.front_app')
@section('content')

@foreach ($data as $dt)
    
<!-- Single Video Start -->
<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gen-episode-wrapper style-1">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gen-post-media">
                                <img src="{{asset('upload/'.$dt->poster.'')}}" alt="blog-image" loading="lazy">
                            </div>
                                
                        </div>
                       


                        <div class="col-lg-12">
                            <div class="single-episode">
                                <div class="gen-single-tv-show-info">
                                    <h2 class="gen-title">{{$dt->judul}}</h2>
                                    <div class="gen-single-meta-holder">
                                        {{-- <ul>
                                            <li>40min</li>
                                            <li>
                                                <i class="fas fa-eye">
                                                </i>
                                                <span>212 Views</span>
                                            </li>
                                        </ul> --}}
                                    </div>
                                    <p>{!! $dt->desc !!}</p>
                                    <div class="gen-socail-share">
                                        <h4 class="align-self-center">Social Share :</h4>
                                        <ul class="social-inner">
                                            <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="facebook"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li><a href="#" class="facebook"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                              
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single Video End -->
@endforeach




@endsection