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
                                    <div class="give-rating">
                                        <h4 class="align-self-center">Rating Kamu:</h4>
                                        <input type="hidden" id="movie_id" value="{{$dt->id}}">
                                        <p class="stars" >
                                            {{-- <label class="myrating">0</label> --}}
                                            <span>
                                              <a class="star-1" href="#" data-value="1"></a>
                                              <a class="star-2" href="#" data-value="2"></a>
                                              <a class="star-3" href="#" data-value="3"></a>
                                              <a class="star-4" href="#" data-value="4"></a>
                                              <a class="star-5" href="#" data-value="5"></a>
                                            </span>
                                        </p>
                                       
                                    </div>
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

<script>
      $(document).ready(function() {
        // Fetch the initial rating from the server
        $.ajax({
            url: '{{url("/rating/get/".$movie_id."")}}',
            method: 'GET',
            success: function(response) {
                if(response.rating) {
                    updateStars(response.rating);
                    $('.myrating').html(response.rating);
                }
            }
        });

        // Handle star click event
        $('.stars a').on('click', function(e) {
            e.preventDefault();

            // var rating = $(this).text();
            var rating = $(this).data('value');
            var movieId = {{$movie_id}}; 
            console.log(movieId);
            console.log(rating);

            // Send the rating to the server
            if (rating !== undefined) {
            $.ajax({
                url: '{{ url("/rating/toggle") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    movie_id: movieId,
                    rating: rating
                },
                success: function(response) {
                    if(response.success) {
                        updateStars(response.rating);
                        $('.myrating').html(response.rating);
                    }
                }
            });
        }else{
            console.log('rating ngga ada');
        }
        });

        // Function to update the stars based on the rating
        function updateStars(rating) {
            $('.stars a').removeClass('active');
            $('.stars a').each(function() {
                if ($(this).data('value') <= rating) {
                    $(this).addClass('active');
                }
            });
        }
    });
       
   
</script>


@endsection