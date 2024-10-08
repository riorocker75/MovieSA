<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Rating;
use App\Models\Favorit;
use App\Models\Film;
use App\Models\FilmSub;

use App\Models\Review;
use App\Models\Tag;
use App\Models\Users;
use App\Models\Userdetail;
use App\Models\Userslistfilm;

class FrontCtrl extends Controller
{
    
    function index(){
        $user_umur = Session::get('umur'); // Example user age

            if ($user_umur < 13) {
                $data_recom = Film::where('umur', '13')->inRandomOrder()->get();
            } elseif ($user_umur < 17) {
                $data_recom = Film::whereIn('umur', ['13', '17'])->inRandomOrder()->get();
            } else {
                $data_recom = Film::inRandomOrder()->get();
            }
            // $kategori_umur = [];

            // $kategori_umur = mamdaniCek($user_umur);

            // if ($kategori_umur) {
            //     $data_recom = Film::whereIn('umur', $kategori_umur)->inRandomOrder()->get();
            // } else {
            //     $data_recom = Film::inRandomOrder()->get();
            // }

        
        $data_film = Film::orderBy('id','desc')->get();
        $data_po = Film::where('cat_id','3')->orderBy('id','desc')->get();

        return view('front.front',[
            'data_film' => $data_film,
            'data_recom' =>$data_recom,
            'data_po' => $data_po,
        ]);

    }




    function play_movie($slug){
        $user_umur = Session::get('umur'); // Example user age

        $data = null;
        $error_message = null;

        if ($user_umur < 17) {
            $data = Film::where('umur', '13')->where('slug',$slug)->get();
            if ($data->isEmpty()) {
                $error_message = 'Umur tidak cukup untuk mengakses film ini.';
            }
        } elseif ($user_umur < 21) {
            $data = Film::whereIn('umur', ['13', '17'])->where('slug',$slug)->get();
            if ($data->isEmpty()) {
                $error_message = 'Umur tidak cukup untuk mengakses film ini.';
            }
        } else {
            $data = Film::where('slug',$slug)->get();
        }
        if ($data && $data->isNotEmpty()) {
                $ds= Film::where('slug',$slug)->first();
                $data_sub=FilmSub::where('film_id',$ds->id)->orderBy('eps','asc')->get();
                $eps1=FilmSub::where('film_id',$ds->id)->where('eps',1)->first();
                $movie_id= $ds->id;
                return view('front.user.single_play',[
                    'data' => $data,
                    'data_sub' =>$data_sub,
                    'eps1' => $eps1,
                    'movie_id' =>$movie_id,
                ]);
            } else {
                return redirect()->back()->with('alert-danger', $error_message ?? 'Film tidak ditemukan.');
            }
    }

    //movies
    
    function movie_data(){
        $data = Film::orderBy('id','desc')->paginate(8);
        return view('front.movie',[
            'data' => $data
        ]);
    }

    // blog
    function blog_data(){
        $data = BlogPost::orderBy('id','desc')->paginate(8);
        return view('front.blog',[
            'data' => $data
        ]);
    }

    function blog_detail($slug){
        $data= BlogPost::where('slug',$slug)->get();
        return view('front.single_blog',[
            'data' =>$data
        ]);
    }

    // pencarian
    function cari_movie(Request $request){
        $cari= $request->cari;
        $data= Film::where('judul', 'LIKE', "%{$cari}%")
        ->orWhere('desc', 'LIKE', "%{$cari}%")
        ->orWhere('genre', 'LIKE', "%{$cari}%")
        ->paginate(8);

        return view('front.search_movie',[
            'data' => $data,
            'cari' => $cari
        ]);
    }

    function cari_blog(Request $request){
        $cari= $request->cari;
        $data= BlogPost::where('judul', 'LIKE', "%{$cari}%")
        ->orWhere('desc', 'LIKE', "%{$cari}%")
        ->paginate(8);

        return view('front.search_blog',[
            'data' => $data,
            'cari' => $cari
        ]);
    }


    // favorite add
    function favorite_act(Request $request){

        $movieId = $request->movie_id;
        $userId = Session::get('user_id');

    $favorite = DB::table('favorit')
        ->where('film_id', $movieId)
        ->where('user_id', $userId)
        ->first();
   
        if ($favorite) {
            DB::table('favorit')
                ->where('film_id', $movieId)
                ->where('user_id', $userId)
                ->delete();

            return response()->json(['status' => 'removed']);
        } else {
            DB::table('favorit')->insert([
                'film_id' => $movieId,
                'user_id' => $userId,
            ]);

            return response()->json(['status' => 'added']);
        }     
    }

    // rating
    function rating_act(Request $request){
        // $request->validate([
        //     'movie_id' => 'required',
        //     'rating' => 'required|min:1|max:5',
        // ]);
        \Log::info('Request Data:', $request->all());
        $movieId = $request->movie_id;
        $userId = Session::get('user_id');
        // Rating::insert(
        //     ['user_id' => $userId,
        //      'film_id' => $movieId,
        //      'rating' => $request->rating,
        //      'tgl' => date('Y-m-d')
        //     ],
        // );

        $rating = Rating::where('user_id',  $userId)
                    ->where('film_id', $movieId)
                    ->first();

            if ($rating) {
                // Update the existing rating
                $rating = DB::table('rating')
                ->where('user_id',$userId)
                ->where('film_id',$movieId)
                ->update([
                    'rating' => $request->rating
                ]);
            } else {
                // Create a new rating
                $rating = Rating::insert([
                    'user_id' => $userId,
                    'film_id' => $movieId,
                    'rating' => $request->rating,
                    'tgl' => date('Y-m-d')
                ]);
            }

        return response()->json(['success' => true, 'rating' => $request->rating]);
    }

    function rating_get($movieId){
        $rating = Rating::where('user_id', Session::get('user_id'))
        ->where('film_id', $movieId)
        ->pluck('rating')
        ->first();

        return response()->json(['rating' => $rating]);
    }

    // user

    function user_dashboard(){
        return view('front.user.dashboard');
    }

    function user_fav($id){
        $data= Favorit::where('user_id',$id)->orderBy('id','desc')->paginate(8);
        return view('front.user.favorit',[
            'data' => $data
        ]);
    }

    function user_setting_act(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);  
        $id=$request->id;

        if($request->password == ""){
          
            DB::table('user_detail')->where('user_id',$id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
            ]);

        }else{

            DB::table('user')->where('id',$id)->update([
                'password' => bcrypt($request->password),
            ]);

            DB::table('user_detail')->where('user_id',$id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
            ]);
        }
        return redirect('/dashboard/user')->with('alert-success','Data telah di ubah'); 
        

    }   

}
