@extends('layouts.main_app')
@section('content')
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center justify-content-between">
            <div class="col-sm-auto">
              <div class="page-header-title">
                <h5 class="mb-0">Tambah Blog Post</h5>
              </div>
            </div>
              <div class="col-sm-auto">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="ph-duotone ph-house"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah Blog Post </a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end breadcrumb -->
      <form action="{{url('/dashboard/admin/blog_post/update')}}" method="post" enctype="multipart/form-data">
        @csrf  
        @method('POST')  
        @foreach ($data as $dt)

      <div class="row">
      
        <div class="col-sm-8">
            <div class="card">
             
              <div class="card-header">
                    <h5>Isi data blog</h5>
                      
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" value="{{$dt->id}}" name="id" id="idFilm" required>
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" placeholder="isikan judul movie.." name="judul" value="{{$dt->judul}}" required>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" id="classic-editor" style="display: none;" placeholder="Isikan deskripsi blog disini" cols="50" required>                            
                            {!!$dt->desc!!}
                        </textarea>
                      </div>


                  </div>
            </div>    
        </div>
        

        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                   
                </div>

                <div class="card-body">
                   
                    @if ($dt->poster == "")
                    <div class="form-group">
                      <label class="form-label">Upload Cover Post</label>
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
                              url:"/dashboard/admin/ajax/hapus-cover-post",
                              data:{cover:cover},
                              success: function(data){          
                                location.reload(data);
                                
                              }
                            
                          });
                        }
                          
                      });
               </script>
                      
                      
                      <div class="form-group">
                        <label class="form-label" for="exampleFormControlSelect1">Kategori Post</label>
                        <select class="form-select" name="cat_id" id="exampleFormControlSelect1" required>
                            @php
                                $cat= App\Models\Category::where('status',2)->orderBy('id','desc')->get();
                                $cf =App\Models\Category::where('id',$dt->cat_id)->first();
                             @endphp
                            <option value="{{$cf->id}}" selected>{{$cf->nama}}</option>
                            
                            @foreach ($cat as $ct)
                               <option value="{{$ct->id}}">{{$ct->nama}}</option>
                            @endforeach
                            
                        </select>
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
                    <button type="submit" class="btn btn-primary"> Simpan</button>

                </div>
         
    
        




      </div>
      @endforeach
    </form>
     
      <script type="text/javascript">
      

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
       

        });
    </script>


@endsection