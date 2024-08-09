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
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Data Movie </h5>
                    <br>
                    <a href="{{url('/dashboard/admin/movie_post/add')}}" class="btn btn-sm btn-primary "><i class="fa fa-plus" aria-hidden="true"></i> Tambah movie</a>
              </div>
              <div class="card-body">
                <div class="dt-responsive">
                  <table id="table1" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul movie</th>
                        <th>Tanggal Rilis</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no= 1;
                  @endphp 
                        @foreach ($data_movie as $dm)
                          
                      <tr>
                        <td>{{$no++}}</td>
                  
                        <td>{{$dm->judul}}</td>
                        <td>{{format_tanggal($dm->tgl)}}</td>
                        <td>
                            <a href="{{url('/dashboard/admin/movie_post/edit/'.$dm->id.'')}}" class="btn btn-warning"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            {{-- <a href="{{url('/dashboard/admin/movie/edit/'.$dt->id.'')}}" class="btn btn-default"> <i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                            <a href="{{url('/dashboard/admin/movie_post/delete/'.$dm->id.'')}}" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      
                      </tr>
                      @endforeach
                      
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- end data movie --}}

          {{-- data post --}}
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Data Blog Post</h5>
                <br>
                <a href="{{url('/dashboard/admin/blog_post/add')}}" class="btn btn-sm btn-info "><i class="fa fa-plus" aria-hidden="true"></i> Tambah Blog</a>
              </div>
              <div class="card-body">
                <div class="dt-responsive">
                  <table id="table2" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                       
                        <th>Judul Post</th>
                        <th>Tanggal Post</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $no =1;
                  @endphp 
                        @foreach ($data_blog as $db)
                          
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$db->judul}}</td>
                        <td>{{format_tanggal($db->tgl)}}</td>
                        <td>


                        </td>
                      
                      </tr>
                      @endforeach
                      
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- end data post --}}

      {{-- end isi tabel --}}

@endsection