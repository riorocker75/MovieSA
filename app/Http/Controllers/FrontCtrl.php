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
        
    }


}
