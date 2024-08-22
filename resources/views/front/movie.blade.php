@extends('layouts.front_app')
@section('content')
<!-- breadcrumb -->
<div class="gen-breadcrumb" style="background-image: url('images/background/asset-25.jpeg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <div class="gen-breadcrumb-title">
                        <h1>
                            Movies
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                        class="fas fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">Movie</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

{{-- movies all --}}
<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($data as $dt)
                        
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="gen-carousel-movies-style-3 movie-grid style-3">
                            <div class="gen-movie-contain">
                                <div class="gen-movie-img">
                                    <div class="front-rating">
                                        <i class="fa fa-star" aria-hidden="true" style="color:#fbc02d"> 
                                           
                                           @php
                                           $movie = \App\Models\Film::findOrFail($dt->id);
                                           $averageRating = $movie->averageRating();
                                           @endphp
                                         <span style="color: #fff;">
                                               {{$averageRating ?? '' }}
                                           </span>
                                        </i>
                                     </div>
                                    <img src="{{asset('/upload/'.$dt->poster.'')}}" alt="streamlab-image">
                                    <div class="gen-movie-add">
                                        <div class="wpulike wpulike-heart">
                                            <div class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                @csrf
                                                <button class="favButton favorite-toggle" data-movie-id="{{ $dt->id }}">
                                                    <i class="fa fa-heart {{ $dt->is_favorited ? 'fRed' : '' }}"></i>
                                                 </button>
                                            </div>
                                        </div>
                                        <ul class="menu bottomRight">
                                            <li class="share top">
                                                <i class="fa fa-share-alt"></i>
                                                <ul class="submenu">
                                                    <li><a href="#" class="facebook"><i
                                                                class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li><a href="#" class="facebook"><i
                                                                class="fab fa-instagram"></i></a>
                                                    </li>
                                                    <li><a href="#" class="facebook"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    
                                    </div>
                                    <div class="gen-movie-action">
                                        <a href="{{url('/user/movie/play/'.$dt->slug.'')}}" class="gen-button">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="gen-info-contain">
                                    <div class="gen-movie-info">
                                        <h3><a href="{{url('/user/movie/play/'.$dt->slug.'')}}">{{Str::limit($dt->judul,80)}}</a></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                        <ul>
                                            {{-- <li>2hr 00mins</li> --}}
                                            <li>
                                                <a href=""><span>{{$dt->genre}}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    {{-- pagination --}}

    {{$data->links('pag')}}

    </div>


</section>

@endsection
