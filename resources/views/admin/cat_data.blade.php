@extends('layouts.main_app')
@section('content')

      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center justify-content-between">
            <div class="col-sm-auto">
              <div class="page-header-title">
                <h5 class="mb-0">Semua Kategori</h5>
              </div>
            </div>
              <div class="col-sm-auto">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ph-duotone ph-house"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Semua Kategori</a></li>
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
                <h5>Kategori Movie </h5>
                    <br>
                    <a href="" data-pc-animate="fade-in-scale" data-bs-toggle="modal"
                    data-bs-target="#addCatMovie" class="btn btn-sm btn-primary "><i class="fa fa-plus" aria-hidden="true"></i> Kategori Movie</a>
              </div>
              <div class="card-body">
                <div class="dt-responsive">
                  <table id="table1" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Slug</th>
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
                  
                        <td>{{$dm->nama}}</td>
                        <td>{{$dm->slug}}</td>
                        <td>
                            @if ($dm->slug != 'uncategorized')
                            <a href=""data-pc-animate="fade-in-scale" data-bs-toggle="modal"
                               data-bs-target="#editCatMovie-{{$dm->id}}" class="btn btn-warning"> <i class="fas fa-pen-alt"></i></a>
                            <a href="{{url('/dashboard/admin/cat_movie/delete/'.$dm->id.'')}}" onclick="return confirm('Apa Anda Yakin Hapus Data Ini?')" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                            @endif

                        </td>
                      
                      </tr>
                        {{-- modal edit cat movie --}}
                        <div class="modal fade modal-animate" id="editCatMovie-{{$dm->id}}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update Kategori Movie</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                            </div>
                            <form action="{{url('/dashboard/admin/cat_movie/update')}}" method="post">
                            <div class="modal-body">
                              @csrf
                              @method('POST')
                              <div class="form-group">
                                  <label class="form-label">Nama</label>
                                  <input type="hidden" class="form-control" name="id" value="{{$dm->id}}" required>
                                  <input type="text" class="form-control" name="nama" value="{{$dm->nama}}" required>
                                </div>
                  
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary shadow-2">Simpan</button>
                            </div>
                          </form>
                            
                          </div>
                        </div>
                      </div>  
                        {{-- end modal --}}
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
                <h5>Kategori Blog Post</h5>
                <br>
                <a href="" data-pc-animate="fade-in-scale" data-bs-toggle="modal"
                    data-bs-target="#addCatBlog"
                 class="btn btn-sm btn-info "><i class="fa fa-plus" aria-hidden="true"></i> Kategori Blog</a>
              </div>
              <div class="card-body">
                <div class="dt-responsive">
                  <table id="table2" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Slug</th>
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
                        <td>{{$db->nama}}</td>
                        <td>{{$db->slug}}</td>
                        <td>
                        @if ($dm->slug != 'uncategorized-post')
                          <a href="" data-pc-animate="fade-in-scale" data-bs-toggle="modal"
                             data-bs-target="#editCatBlog-{{$db->id}}"
                          class="btn btn-warning"> <i class="fas fa-pen-alt "></i></a>
                          <a href="{{url('/dashboard/admin/cat_blog/delete/'.$db->id.'')}}" onclick="return confirm('Apa Anda Yakin Hapus Data Ini?')" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                        @endif
                        </td>
                      
                      </tr>

                      {{-- modal edit cat blog --}}
                      <div class="modal fade modal-animate" id="editCatBlog-{{$db->id}}" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Update Kategori Blog</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                            </div>
                            <form action="{{url('/dashboard/admin/cat_blog/update')}}" method="post">
                            <div class="modal-body">
                              @csrf
                              @method('POST')
                              <div class="form-group">
                                  <label class="form-label">Nama</label>
                                  <input type="hidden" class="form-control" name="id" value="{{$db->id}}" required>
                                  <input type="text" class="form-control" name="nama" value="{{$db->nama}}" required>
                                </div>
                  
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary shadow-2">Simpan</button>
                            </div>
                          </form>
                            
                          </div>
                        </div>
                      </div>  
                        {{-- end modal --}}
                      @endforeach
                      
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- end data post --}}

      {{-- end isi tabel --}}

      {{-- modal add movie --}}
      <div class="modal fade modal-animate" id="addCatMovie" tabindex="-1"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Menambahkan Kategori Movie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
          </div>
          <form action="{{url('/dashboard/admin/cat_movie/act')}}" method="post">
          <div class="modal-body">
            @csrf
            @method('POST')
            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" id="judulId" class="form-control" name="nama" required>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary shadow-2">Simpan</button>
          </div>
        </form>
          
        </div>
      </div>
    </div>    

      {{-- modal add blog --}}
       
      <div class="modal fade modal-animate" id="addCatBlog" tabindex="-1"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Menambahkan Kategori Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
          </div>
          <form action="{{url('/dashboard/admin/cat_blog/act')}}" method="post">
          <div class="modal-body">
            @csrf
            @method('POST')
            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" id="judulId" class="form-control" name="nama" required>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary shadow-2">Simpan</button>
          </div>
        </form>
          
        </div>
      </div>
    </div> 

@endsection