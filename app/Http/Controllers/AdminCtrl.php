<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Favorit;
use App\Models\Rating;

use App\Models\Film;
use App\Models\FilmSub;

use App\Models\Review;
use App\Models\Tag;
use App\Models\Users;
use App\Models\Userdetail;
use App\Models\Userslistfilm;



class AdminCtrl extends Controller
{
    
    function index(){
        return view('admin.admin');
     }


     function all_post(){
        $data_movie=Film::orderBy('id','desc')->get();
        $data_blog=BlogPost::orderBy('id','desc')->get();

        return view('admin.post_data',[
            'data_movie'=>$data_movie,
            'data_blog'=>$data_blog,
        ]);
     }

      
    //  movie

     function movie_post_add(){
        return view('admin.movie_add');
     }

     function movie_post_act(Request $request){
        $request->validate([
            'judul' => 'required|unique:film,judul',
            'desc' => 'required',
            'trailer' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slug = Str::slug($request->judul);

        $coverName = time().'.'.$request->cover->extension();  
        $request->cover->move(public_path('upload'), $coverName);

        $date=date('Y-m-d');

        $lastId=  DB::table('film')->insertGetId([
            'judul' => $request->judul,
            'slug' =>$slug,
            'poster'=> $coverName,
            'trailer'=> $request->trailer,
            'desc' => $request->desc,
            'tag' => $request->tag,
            'cast' => $request->cast,
            'genre' => $request->genre,
            'umur' => $request->umur,
            'cat_id' => $request->cat_id,
            'tgl' => $date,
            'status' => 1
        ]);
        $eps = 1;
        foreach ($request->video as $key => $value) {
            if (is_array($value)) {
                $values = json_encode($value);  // Convert array to JSON string

            }
            $dataArray = json_decode($values, true);
            $iframeContent = $dataArray['subjek'];
            DB::table('filmsub')->insert([
               'film_id'=> $lastId,
               'video' => $iframeContent,
               'eps' => $eps++
               
            ]);
        }

        return redirect('/dashboard/admin/all/post')->with('alert-success','Data sudah terkirim');

     }

     function movie_post_edit($id){
        $data = Film::where('id',$id)->get();
        $data_sub = FilmSub::where('film_id',$id)->get();

        return view('admin.movie_edit',[
            'data' =>$data,
            'data_sub' => $data_sub,
        ]);
     }

     function movie_post_update(Request $request){
        $request->validate([
            'judul' => 'required',
            'desc' => 'required',
            'trailer' => 'required',
            'video.*.subjek' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slug = Str::slug($request->judul);

        $id= $request->id;
        $date=date('Y-m-d');

        

        if($request->cover == ""){
            DB::table('film')->where('id',$id)->update([
            'judul' => $request->judul,
            'slug' =>$slug,
            'trailer'=> $request->trailer,
            'desc' => $request->desc,
            'tag' => $request->tag,
            'genre' => $request->genre,
            'umur' => $request->umur,
            'cast' =>$request->cast,
            ]);

            // ini untuk update episode
            foreach ($request->video as $index => $video) {
                $id_embed= $request->id_embed[$index];
                $videoSubjek = $video['subjek'];
        
                // Update the database
                $data = FilmSub::find($id_embed);
                $data->video = $videoSubjek;
                $data->save();
            }
            
            $eps=$request->eps + 1;
            if (is_array($request->videos)) {
                foreach ($request->videos as $key => $value) {
                    
                    if (is_array($value)) {
                        $values = json_encode($value);  // Convert array to JSON string
        
                    }
                    $dataArray = json_decode($values, true);
                    $iframeContent = $dataArray['subyek'];
                    DB::table('filmsub')->insert([
                    'film_id'=> $id,
                    'video' => $iframeContent,
                    'eps' => $eps++
                    ]);
                }
            }

        }else{
            //jika gambar ada
            $coverName = time().'.'.$request->cover->extension();  
            $request->cover->move(public_path('upload'), $coverName);
    
            DB::table('film')->where('id',$id)->update([
                'judul' => $request->judul,
                'slug' =>$slug,
                'cast' =>$request->cast,
                 'poster'=> $coverName,
                'trailer'=> $request->trailer,
                'desc' => $request->desc,
                'tag' => $request->tag,
                'genre' => $request->genre,
                'umur' => $request->umur,
                ]);
                
                // ini untuk update episode
                foreach ($request->video as $index => $video) {
                    $eps=$request->eps;
                    $id = $request->id_embed[$index];
                    $videoSubjek = $video['subjek'];
            
                    // Update the database
                    $data = FilmSub::find($id);
                    $data->video = $videoSubjek;
                    $data->save();
                }

                $eps=$request->eps + 1;
                if (is_array($request->videos)) {
                foreach ($request->videos as $key => $value) {
                
                    if (is_array($value)) {
                        $values = json_encode($value);  // Convert array to JSON string
        
                    }
                    $dataArray = json_decode($values, true);
                    $iframeContent = $dataArray['subyek'];
                    DB::table('filmsub')->insert([
                       'film_id'=> $id,
                       'video' => $iframeContent,
                       'eps' => $eps++
                    ]);
                }
            }

        };
        return redirect('/dashboard/admin/all/post')->with('alert-success','Data  sudah terkirim');






     }

        // hapus eps
    function hapus_eps(Request $request){
        $id= $request->kode;
        FilmSub::where('id',$id)->delete();
    }

    // hapus cover

    function hapus_cover(Request $request){
        $id= $request->cover;
        $film=Film::where('id',$id)->first();
        $destinationPath= public_path('upload');
        File::delete($destinationPath.'/'.$film->cover);

        DB::table('film')->where('id',$id)->update([
            'poster' => ""
        ]);

    }

     function movie_post_delete($id){
        $film=Film::where('id',$id)->first();
        $destinationPath= public_path('upload');
        File::delete($destinationPath.'/'.$film->cover);

        FilmSub::where('film_id',$id)->delete();
        Film::where('id',$id)->delete();
        return redirect('/dashboard/admin/all/post')->with('alert-success','Data Berhasil');  
     }



    // blogpost

    function blog_post_add(){
        return view('admin.blog_add');
    }

    function blog_post_act(Request $request){
        $request->validate([
            'judul' => 'required|unique:post,judul',
            'desc' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slug = Str::slug($request->judul);

        $coverName = time().'.'.$request->cover->extension();  
        $request->cover->move(public_path('upload'), $coverName);

        $date=date('Y-m-d');
        DB::table('post')->insert([
            'judul' => $request->judul,
            'slug' => $slug,
            'desc' => $request->desc,
            'poster' => $coverName,
            'cat_id' => $request->cat_id,
            'tag' => $request->tag,
            'tgl' => $date,
            'status' => 1
        ]);
        return redirect('/dashboard/admin/all/post')->with('alert-success','Data Berhasil');  

    }

    function blog_post_edit($id){
        $data = BlogPost::where('id',$id)->get();

        return view('admin.blog_edit',[
            'data' =>$data,
        ]);
    }

    function blog_post_update(Request $request){
        $request->validate([
            'judul' => 'required',
            'desc' => 'required',
            'cover' => '|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $slug = Str::slug($request->judul);

       $id=$request->id;

        if($request->cover == ""){
            DB::table('post')->where('id',$id)->update([
                'judul' => $request->judul,
                'slug' => $slug,
                'desc' => $request->desc,
                'cat_id' => $request->cat_id,
                'tag' => $request->tag,
            ]);
        }else{
            $coverName = time().'.'.$request->cover->extension();  
            $request->cover->move(public_path('upload'), $coverName);
            DB::table('post')->where('id',$id)->update([
                'judul' => $request->judul,
                'slug' => $slug,
                'desc' => $request->desc,
                'poster' => $coverName,
                'cat_id' => $request->cat_id,
                'tag' => $request->tag,
            ]);
        }
       
        return redirect('/dashboard/admin/all/post')->with('alert-success','Data Berhasil');  

    }

    function blog_post_delete($id){
        $post=BlogPost::where('id',$id)->first();
        $destinationPath= public_path('upload');
        File::delete($destinationPath.'/'.$post->cover);

        BlogPost::where('id',$id)->delete();
        return redirect('/dashboard/admin/all/post')->with('alert-success','Data Berhasil'); 
    }

    function hapus_cover_post(Request $request){
        $id= $request->cover;
        $post=BlogPost::where('id',$id)->first();
        $destinationPath= public_path('upload');
        File::delete($destinationPath.'/'.$post->cover);

        DB::table('post')->where('id',$id)->update([
            'poster' => ""
        ]);

    }


    // users

    function user_data(){
        $data=Users::where('level',2)->orderBy('id','desc')->get();
        return view('admin.user_data',[
            'data' => $data
        ]);
    }

    function user_add(){
       
    }

    function user_act(Request $request){
       
    }

    function user_edit($id){
       
    }

    function user_update(Request $request){
       
    }

    function user_delete($id){
        Userdetail::where('user_id',$id)->delete();
        Users::where('id',$id)->delete();
        return redirect('/dashboard/admin/user/data')->with('alert-success','Data Berhasil'); 
    }

    // review

    // categories
    function cat_data(){
        $data_movie= Category::where('status',1)->get();
        $data_blog= Category::where('status',2)->get();

        return view('admin.cat_data',[
            'data_movie' =>$data_movie,
            'data_blog' =>$data_blog,
        ]);
    }
    
    function cat_movie_act(Request $request){
        $request->validate([
            'nama' => 'required',
        ]); 
        $slug=Str::slug($request->nama);
        DB::table('category')->insert([
            'nama' =>$request->nama,
            'slug' =>$slug,
            'status' => 1
        ]);  
        return redirect('/dashboard/admin/categori/all')->with('alert-success','Data Berhasil'); 

    }

    function cat_movie_update($id){
        $request->validate([
            'nama' => 'required',
        ]); 
        $slug=Str::slug($request->nama);
        $id = $request->id;
        DB::table('category')->where('id',$id)->update([
            'nama' =>$request->nama,
            'slug' =>$slug,
        ]);  
        return redirect('/dashboard/admin/categori/all')->with('alert-success','Data Berhasil'); 

    }

    function cat_movie_delete($id){
       Category::where('id',$id)->delete();
       return redirect('/dashboard/admin/categori/all')->with('alert-success','Data Berhasil'); 

    }

    // cat blog
    function cat_blog_act(Request $request){
        $request->validate([
            'nama' => 'required',
        ]); 
        $slug=Str::slug($request->nama);
        DB::table('category')->insert([
            'nama' =>$request->nama,
            'slug' =>$slug,
            'status' => 2
        ]);  
        return redirect('/dashboard/admin/categori/all')->with('alert-success','Data Berhasil'); 

    }

    function cat_blog_update($id){
        $request->validate([
            'nama' => 'required',
        ]); 
        $slug=Str::slug($request->nama);
        $id = $request->id;
        DB::table('category')->where('id',$id)->update([
            'nama' =>$request->nama,
            'slug' =>$slug,
        ]);  
        return redirect('/dashboard/admin/categori/all')->with('alert-success','Data Berhasil'); 

    }

    function cat_blog_delete($id){
        Category::where('id',$id)->delete();
        return redirect('/dashboard/admin/categori/all')->with('alert-success','Data Berhasil'); 

    }
 


}
