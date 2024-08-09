<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Favorit;
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
            'judul' => 'required',
            'desc' => 'required',
            'trailer' => 'required',
            'video.*.subjek' => 'required',
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

        return redirect('/dashboard/admin/all/post')->with('alert-success','Data diri anda sudah terkirim');

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
        
     }

     function movie_post_delete($id){
        FilmSub::where('film_id',$id)->delete();
        Film::where('id',$id)->delete();
        return redirect('/dashboard/admin/all/post')->with('alert-success','Data Berhasil');  
     }



    // blogpost

    function blog_post_add(){
        return view('admin.blog_add');
    }

    function blog_post_act(Request $request){
       
    }

    function blog_post_edit($id){
       
    }

    function blog_post_update(Request $request){
       
    }

    function blog_post_delete($id){
       
    }




    // users

    function user_data(){

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
       
    }

    // review





}
