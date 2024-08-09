@extends('layouts.main_app')
@section('content')
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center justify-content-between">
            <div class="col-sm-auto">
              <div class="page-header-title">
                <h5 class="mb-0">Tambah Movie</h5>
              </div>
            </div>
              <div class="col-sm-auto">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ph-duotone ph-house"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Movie </a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end breadcrumb -->
      <form action="{{url('/dashboard/admin/movie_post/act')}}" method="post" enctype="multipart/form-data">
        @csrf  
        @method('POST')  
      <div class="row">
      
        <div class="col-sm-8">
            <div class="card">
             
              <div class="card-header">
                    <h5>Isi data Movie</h5>
                      
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" placeholder="isikan judul movie.." name="judul" required>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" id="classic-editor" style="display: none;" cols="50" required>                            
                            <p>Kualitas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</p><p>Negara &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</p><p>Bintang film &nbsp; &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp;</p><p>Sutradara &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</p><p>Genre &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:</p><p>IMDb &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</p><p>Diterbitkan &nbsp; &nbsp; &nbsp;:</p><p>&nbsp; Synopsis</p><p>
                        </textarea>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Link Trailer(Embed) </label>
                        <textarea name="trailer" class="form-control" id="" cols="10" rows="3" placeholder="isikan embed youtube disini."></textarea>
                        {{-- <input type="text" class="form-control" placeholder="isikan embed youtube disini." name="trailer" required> --}}
                      </div>


                      <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                          <th>Embed Movie</th>
                          <th>Action</th>
                      </tr>
                      <tr>
                          <td>
                             <textarea name="video[0][subjek]" class="form-control" id="" cols="18" rows="2" placeholder="isikan embed kode disini." required></textarea>
                          </td>
                          <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah Episode</button></td>
                      </tr>
                    </table>
                      


                  </div>
            </div>    
        </div>
        

        <div class="col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">
                   
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label class="form-label" for="exampleFormControlSelect1">Kategori Umur</label>
                        <select class="form-select" name="umur" id="exampleFormControlSelect1" required>
                            <option >Pilih kategori umur penonton</option>
                            <option value="13">13+</option>
                          <option value="17">17+</option>
                          <option value="21">21+</option>
                        </select>
                      </div>

                    <div class="form-group">
                        <label class="form-label">Upload Cover Film</label>
                        <input type="file" class="form-control"  name="cover">
                      </div> 
                      
                      
                      <div class="form-group">
                        <label class="form-label" for="exampleFormControlSelect1">Kategori Movie</label>
                        <select class="form-select" name="cat_id" id="exampleFormControlSelect1" required>
                            <option >Pilih kategori</option>
                            @php
                                $cat= App\Models\Category::orderBy('id','desc')->get();
                            @endphp
                            @foreach ($cat as $ct)
                               <option value="{{$ct->id}}">{{$ct->nama}}</option>
                            @endforeach
                            
                        </select>
                      </div>
                      </div>

                    </div>
                    <button type="submit" class="btn btn-primary"> Simpan</button>

                </div>
         
    
        




      </div>
    </form>
     
      <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><textarea class="form-control" cols="18" rows="2" name="video[' + i +
                '][subjek]" placeholder="isikan embed kode disini." required></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>


@endsection