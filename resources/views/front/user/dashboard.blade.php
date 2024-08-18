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
                            Dashboard Akun
                        </h1>
                    </div>
                    <div class="gen-breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><i
                                        class="fas fa-home mr-2"></i>Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<section class="gen-section-padding-3">
    <div class="container">
        <div class="row">
            @include('front.user.sidebar_user')
            
            {{-- start content tengah --}}
            <div class="col-xl-9 col-md-12 order-1 order-xl-2">
                <div class="gen-blog gen-blog-col-1">
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="gen-blog-post">
                                <div class="gen-blog-contain">
                                <form action="{{url('/dashboard/user/pengaturan/act')}}" method="post">
                                    @csrf
                                    @method('POST')
                                    @php
                                        $dd= \App\Models\Userdetail::where('user_id',Session::get('user_id'))->first();
                                        $data = \App\Models\Users::where('id',Session::get('user_id'))->get();
                                    @endphp
                                    @foreach ($data as $dt)
                                        
                                    <div class="form-group">
                                        <label for="">Username <span style="color:red">* Tidak bisa diubah</span></label>
                                        <input type="hidden" name="id" value="{{$dt->id}}">
                                         <input type="text" value="{{$dt->username}}" class="form-group" readonly>   
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                         <input type="text" class="form-group" value="{{$dd->nama}}" name="nama" required>   
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email <span style="color:red"></span></label>
                                         <input type="email" class="form-group" name="email" value="{{$dd->email}}" >   
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir <span style="color:red">* Tidak bisa diubah</span></label>
                                         <input type="date" class="form-group" value="{{$dd->umur}}" readonly>   
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password<span style="color:red">* Kosongkan Jika tidak ingin merubah</span></label>
                                         <input type="password" class="form-group" name="password" placeholder="isikan password baru kamu disini">   
                                    </div>
                                    
                                    @endforeach
                                    <div class="gen-btn-container">
                                        <button class="gen-button-block" type="submit">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                             </div>   
                            </div>   

                        </div>
                    </div>
                </div>
            </div>
            {{-- ned content tengah --}}

        {{-- end row --}}
        </div>
    </div>
</section>




@endsection
