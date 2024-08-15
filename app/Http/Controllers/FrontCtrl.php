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

            if ($user_umur < 17) {
                $data_recom = Film::where('umur', '13')->inRandomOrder()->get();
            } elseif ($user_umur < 21) {
                $data_recom = Film::whereIn('umur', ['13', '17'])->inRandomOrder()->get();
            } else {
                $data_recom = Film::inRandomOrder()->get();
            }

        $data_film = Film::orderBy('id','desc')->get();
        return view('front.front',[
            'data_film' => $data_film,
            'data_recom' =>$data_recom
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

                return view('front.user.single_play',[
                    'data' => $data,
                    'data_sub' =>$data_sub,
                    'eps1' => $eps1,
                ]);
            } else {
                return redirect()->back()->with('alert-danger', $error_message ?? 'Film tidak ditemukan.');
            }
    }


}
