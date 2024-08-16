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
                            Search : {{$cari}}
                        </h1>
                        @if($data->isEmpty())
                        <h5><p>Oopss, Tidak ditemukan '{{ request('cari') }}'</p></h5> 
                         @endif
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                        class="fas fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">{{$cari}}</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- Blog-Right-Sidebar -->
<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-md-12">
                <div class="gen-blog gen-blog-col-1">
                    <div class="row">
                        @foreach ($data as $dt)
                            
                        <div class="col-lg-12">
                            <div class="gen-blog-post">
                                <div class="gen-post-media">
                                    <img src="{{asset('upload/'.$dt->poster.'')}}" alt="blog-image" loading="lazy">
                                </div>
                                <div class="gen-blog-contain">
                                    <div class="gen-post-meta">
                                        <ul>
                                            <li class="gen-post-author"><i class="fa fa-user"></i>admin</li>
                                            <li class="gen-post-meta"><a href="{{url('/news/single/'.$dt->slug.'')}}"><i
                                                        class="fa fa-calendar"></i>{{format_tanggal($dt->tgl)}}</a>
                                            </li>
                                            <li class="gen-post-tag">
                                                @php
                                                    $cat= \App\Models\Category::where('id',$dt->cat_id)->first();
                                                @endphp
                                                <a href="#"><i
                                                        class="fa fa-tag"></i>{{$cat->nama}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="gen-blog-title"><a href="{{url('/news/single/'.$dt->slug.'')}}">{{Str::limit($dt->judul,80)}}</a></h5>
                                    <p>{!!Str::limit($dt->desc, 150)!!}</p>
                                    <div class="gen-btn-container">
                                        <a href="{{url('/news/single/'.$dt->slug.'')}}" class="gen-button">
                                            <div class="gen-button-block">
                                                <span class="gen-button-text">Baca Selengkapnya</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    {{$data->appends(['cari' => request('cari')])->links('pag')}}
                    
                </div>
            </div>
            <div class="col-xl-3 col-md-12 mt-4 mt-xl-0">
                <div class="widget widget_search">
                    <form role="search" method="get" class="search-form" action="{{url('/blog/search')}}">
                        @csrf
                        @method('GET')
                        <label>
                            <input type="search" class="search-field" placeholder="Search …"  name="cari">
                        </label>
                        <button type="submit" class="search-submit"></button>
                    </form>
                </div>
                <div class="widget widget_recent_entries">
                    <h2 class="widget-title">Recent Posts</h2>
                    @php
                        $blog=\App\Models\BlogPost::orderBy('id','desc')->limit(5)->get();
                    @endphp
                    <ul>
                        @foreach ($blog as $bg)
                        <li>
                            <a href="{{url('/news/single/'.$bg->slug.'')}}">{{Str::limit($bg->judul,50)}}</a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>
              
                <div class="widget widget_categories">
                    <h2 class="widget-title">Categories</h2>
                    @php
                        $categories= \App\Models\Category::where('status',2)->orderBy('id','desc')->limit(10)->get();
                    @endphp
                    <ul>
                        @foreach ($categories as $cs)
                        <li class="cat-item cat-item-1"><a href="#">{{$cs->nama}}</a></li>
                        @endforeach
                    </ul>
                </div>
              
            </div>
        </div>
    </div>
</section>
<!-- Blog-left-Sidebar -->




























@endsection