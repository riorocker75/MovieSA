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
                            <div class="gen-video-holder">
                                <iframe id="frame_play" width="100%" height="550px" src="{!! $eps1->video!!}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                                
                        </div>
                        <div style="margin-top:20px!important;margin-left:30px" class="gen-episode-wrapper">
                             @foreach ($data_sub as $ds)
                             <button id="play_eps_{{$ds->eps}}" data-video-url="{{ $ds->video }}" class="btn btn-primary" style="margin-right:10px;">Eps {{$ds->eps}}</button>
                                <script>
                                    $(document).ready(function() {
                                        $("#play_eps_{{$ds->eps}}").click(function() {
                                            // Get the new video URL, this can be dynamic or hardcoded for testing
                                            var newVideoUrl = $(this).data("video-url");

                                            $("#frame_play").attr("src", newVideoUrl);
                                           
                                        });
                                    });

                                </script>
                             @endforeach   
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