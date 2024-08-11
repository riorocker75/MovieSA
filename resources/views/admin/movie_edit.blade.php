@extends('layouts.main_app')
@section('content')
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center justify-content-between">
            <div class="col-sm-auto">
              <div class="page-header-title">
                <h5 class="mb-0">Edit Movie</h5>
              </div>
            </div>
              <div class="col-sm-auto">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ph-duotone ph-house"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Edit Movie </a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end breadcrumb -->
      <form action="{{url('/dashboard/admin/movie_post/update')}}" method="post" enctype="multipart/form-data">
        @csrf  
        @method('POST')  
        @foreach ($data as $dt)
            
      <div class="row">
      
        <div class="col-sm-8">
            <div class="card">
             
              <div class="card-header">
                    <h5>Isi data Movie</h5>
                      
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Judul</label>
                        <input type="hidden" value="{{$dt->id}}" name="id" id="idFilm" required>
                        <input type="text" class="form-control" placeholder="isikan judul movie.." value="{{$dt->judul}}" name="judul" required>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" id="classic-editor" style="display: none;" cols="50" required>                            
                            {!! $dt->desc !!}
                        </textarea>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Link Trailer(Embed) </label>
                        <textarea name="trailer" class="form-control" id="" cols="10" rows="3" placeholder="isikan embed youtube disini.">{!! $dt->trailer !!}</textarea>
                        {{-- <input type="text" class="form-control" placeholder="isikan embed youtube disini." name="trailer" required> --}}
                      </div>


                      <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                          <th>Embed Movie</th>
                          <th>Action</th>
                        </tr>
                       
                      <tr>
                       @php
                           $eps= App\Models\FilmSub::where('film_id',$dt->id)->orderBy('id','desc')->limit(1)->get();
                       @endphp

                         
                          <td>
                            @foreach ($data_sub as $index => $ds)
                            <label class="form-label">Episode {{$ds->eps}}</label> <a id="hapusEps-{{$ds->id}}" class="badge bg-danger">Hapus</a>
                            <input type="hidden" name="idEps" value="{{$ds->id}}" id="idEps-{{$ds->id}}">  
                            <input type="hidden" name="vEps" value="{{$ds->eps}}" id="vEps-{{$ds->eps}}"> 
                            <input type="hidden" name="id_embed[{{ $index }}]" value="{{$ds->id}}">
                             <textarea name="video[{{ $index }}][subjek]" class="form-control"  cols="18" rows="2" placeholder="isikan embed kode disini." required>{!!$ds->video!!}</textarea><br>
                             
                             <script>
                                    $('#hapusEps-{{ $ds->id }}').click(function(){
                                      var kode=  $('#idEps-{{ $ds->id }}').val();
                                      var eps=  $('#vEps-{{ $ds->eps }}').val();

                                      var confirmed = confirm("Kamu yakin menghapus Episode "+eps);
                                      if (confirmed) {
                                        $.ajax({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                },
                                            type:"post",
                                            url:"/dashboard/admin/ajax/hapus-eps",
                                            data:{kode:kode},
                                            success: function(data){          
                                              location.reload(data);
                                                // console.log('Server response:',data);
                                            }
                                          
                                        });
                                      }
                                        
                                    });
                             </script>
                             @endforeach
                            
                            </td>
                            
                           @foreach ($eps as $es)
                           <input type="hidden" name="eps" value="{{$es->eps}}">
                           @endforeach
                           
                        </tr>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah Episode</button></td>

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
                            <option value="{{$dt->umur}}" selected>{{$dt->umur}}+</option>
                            <option value="13">13+</option>
                          <option value="17">17+</option>
                          <option value="21">21+</option>
                        </select>
                      </div>
                      @if ($dt->poster == "")
                      <div class="form-group">
                        <label class="form-label">Upload Cover Film</label>
                        <input type="file" class="form-control"  name="cover">
                      </div>
                      @endif 
                     
                      @if ($dt->poster != "")
                      <div class="form-group" id="coverFIlm">
                      
                        <img src="{{asset('upload/'.$dt->poster.'')}}" style="width:80px;height:80px">
                        <br><a id="ubahCover" class="btn btn-outline-danger">Ubah Cover</a>
                      </div>
                      @endif 

                      <script>
                        $('#ubahCover').click(function(){
                          var cover=  $('#idFilm').val();

                          var confirmed = confirm("Kamu yakin menghapus dan merubah Cover ini? ");
                          if (confirmed) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                type:"post",
                                url:"/dashboard/admin/ajax/hapus-cover",
                                data:{cover:cover},
                                success: function(data){          
                                  location.reload(data);
                                  
                                }
                              
                            });
                          }
                            
                        });
                 </script>
                      
                      
                      <div class="form-group">
                        <label class="form-label" for="exampleFormControlSelect1">Kategori Movie</label>
                        <select class="form-select" name="cat_id" id="exampleFormControlSelect1" required>
                            @php
                                 $cat= App\Models\Category::orderBy('id','desc')->get();
                                 $cat_id=App\Models\Category::where('id',$dt->cat_id)->first();
                            @endphp
                            <option value="{{$dt->cat_id}}" selected>{{$cat_id->nama}}</option>
                           
                            @foreach ($cat as $ct)
                               <option value="{{$ct->id}}">{{$ct->nama}}</option>
                            @endforeach
                            
                        </select>
                      </div>

                      <div class="form-group ">
                        <label class="form-label">Cast Pemain</label>
                       
                          <input
                            class="form-control"
                            id="cast"
                            type="text"
                            placeholder="Enter something"
                            name="cast"
                            value="{{$dt->cast}}"
                         >
                      </div>
                      <div class="form-group ">
                        <label class="form-label">Genre</label>
                       
                          <input
                            class="form-control"
                            id="genre"
                            type="text"
                            placeholder="Enter something"
                            name="genre"
                            value="{{$dt->genre}}"
                         >
                      </div>

                      <div class="form-group ">
                        <label class="form-label">Tags</label>
                       
                          <input
                            class="form-control"
                            id="tag"
                            type="text"
                            placeholder="Enter something"
                            name="tag"
                            value="{{$dt->tag}}"

                         >
                      </div>


                      </div>

                    </div>
                    <button type="submit" class="btn btn-primary"> Update</button>

                </div>
         
    



      </div>
      @endforeach

    </form>
     
      <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function () {
            ++i;
            $("#dynamicAddRemove").append('<tr><td><textarea class="form-control" cols="18" rows="2" name="videos[' + i +
                '][subyek]" placeholder="isikan embed kode disini." required></textarea></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });


        document.addEventListener('DOMContentLoaded', function () {
          var genericExamples = document.querySelectorAll('[data-trigger]');
        for (i = 0; i < genericExamples.length; ++i) {
          var element = genericExamples[i];
          new Choices(element, {
            placeholderValue: 'This is a placeholder set in the config',
            searchPlaceholderValue: 'This is a search placeholder'
          });
        }

        var textRemove = new Choices(document.getElementById('tag'), {
          delimiter: ',',
          editItems: true,
          maxItemCount: 7,
          removeItemButton: true
        });
        var textRemove = new Choices(document.getElementById('genre'), {
          delimiter: ',',
          editItems: true,
          maxItemCount: 7,
          removeItemButton: true
        });

        var textRemove = new Choices(document.getElementById('cast'), {
          delimiter: ',',
          editItems: true,
          maxItemCount: 7,
          removeItemButton: true
        });

        });
    </script>


@endsection