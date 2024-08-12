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
      <form action="{{url('/dashboard/admin/blog_post/act')}}" method="post" enctype="multipart/form-data">
        @csrf  
        @method('POST')  
      <div class="row">
      
        <div class="col-sm-8">
            <div class="card">
             
              <div class="card-header">
                    <h5>Isi data blog</h5>
                      
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                        <label class="form-label">Judul</label>
                        <span id="judul_check"></span>
                        <input type="text" id="judulId" class="form-control" placeholder="isikan judul blog.." name="judul" required>
                      </div>

                      <div class="form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="desc" id="classic-editor" style="display: none;" placeholder="Isikan deskripsi blog disini" cols="50" required>                            
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
                   
                    <div class="form-group">
                        <label class="form-label">Upload Cover Blog</label>
                        <input type="file" class="form-control"  name="cover" required>
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

                      <div class="form-group ">
                        <label class="form-label">Tags</label>
                       
                          <input
                            class="form-control"
                            id="tag"
                            type="text"
                            placeholder="Enter something"
                            name="tag"
                         >
                      </div>




                      </div>

                    </div>
                    <button type="submit" class="btn btn-primary"> Simpan</button>

                </div>
         
    
        




      </div>
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

<script>
  $(document).ready(function() {
      $('#judulId').on('input', function() {
          var judul = $(this).val();

          if (judul.length > 0) {
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                  url: '/blog/check-judul',
                  method: 'GET',
                  data: { judul: judul },
                  success: function(response) {
                      if (response.exists) {
                          $('#judul_check').text('Harap ganti judul ini !!').css('color', 'red');
                      } else {
                          $('#judul_check').text('Judul ini tersedia').css('color', 'green');
                      }
                  },
                  error: function() {
                      $('#judul_check').text('Error checking Judul').css('color', 'red');
                  }
              });
          } else {
              $('#judul_check').text('');
          }
      });
  });
</script>


@endsection