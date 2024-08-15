@extends('layouts.main_app')
@section('content')

      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center justify-content-between">
            <div class="col-sm-auto">
              <div class="page-header-title">
                <h5 class="mb-0">Semua Post</h5>
              </div>
            </div>
              <div class="col-sm-auto">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ph-duotone ph-house"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Semua Post</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end breadcrumb -->

      <div class="row">
        {{-- data movie --}}
          <div class="col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Data User </h5>
                    <br>
              </div>
              <div class="card-body">
                <div class="dt-responsive">
                  <table id="table1" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Umur</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no= 1;
                  @endphp 
                        @foreach ($data as $dm)
                          @php
                              $ud= \App\Models\Userdetail::where('user_id',$dm->id)->first();
                              $lahir = new DateTime($ud->umur);
                                $sekarang = new DateTime();
                                $umur = $lahir->diff($sekarang);
                          @endphp
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$ud->nama}}</td>
                        <td>{{$ud->email}}</td>
                        <td>{{$umur->y}} tahun</td>
                        <td>
                            {{-- <a href="{{url('/dashboard/admin/user/edit/'.$dm->id.'')}}" class="btn btn-warning"> <i class="fas fa-pen-alt    "></i></a> --}}
                            <a href="{{url('/dashboard/admin/user/delete/'.$dm->id.'')}}" class="btn btn-danger" onclick="return confirm('Apa Anda Yakin Hapus Data Ini?')"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      
                      </tr>
                      @endforeach
                      
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- end data movie --}}

        

      {{-- end isi tabel --}}

@endsection