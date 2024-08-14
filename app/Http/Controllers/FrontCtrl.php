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
        $data_film = Film::orderBy('id','desc')->get();
        return view('front.front',[
            'data_film' => $data_film,
        ]);

    }




    function play_movie($slug){
        $data= Film::where('slug',$slug)->get();
        $ds= Film::where('slug',$slug)->first();
        $data_sub=FilmSub::where('film_id',$ds->id)->orderBy('eps','asc')->get();
        $eps1=FilmSub::where('film_id',$ds->id)->where('eps',1)->first();

        return view('front.user.single_play',[
            'data' => $data,
            'data_sub' =>$data_sub,
            'eps1' => $eps1,
        ]);
    }


}
