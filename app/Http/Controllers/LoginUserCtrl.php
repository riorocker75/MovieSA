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

class LoginUserCtrl extends Controller
{

    function index(){
        return view('front.login');
    }

    function cek_login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = Users::where('username',$username)->first();
        // cek umur 
        $user_detail = Userdetail::where('user_id',$data->id)->first();
        $lahir = new \DateTime($user_detail->umur);
        $sekarang = new \DateTime();
        $umur = $lahir->diff($sekarang);

        if($data){
           if($data->level == "2"){
            Session::flush();
                
                if(Hash::check($password,$data->password)){
                    Session::put('usr_username', $data->username);
                    Session::put('level', 2);
                    Session::put('umur', $umur->y);
                    Session::put('login-user',TRUE);
                    return redirect('/dashboard/user')->with('alert-success','Selamat Datang Kembali');
                }else{
                    return redirect('/login')->with('alert-danger','Password atau Email, Salah !');
                }
           }else{
                 return redirect('/login')->with('alert-danger','Password atau Email, Salah !');
                
           }

        }else{
            return redirect('/login')->with('alert-danger','Password atau Email, Salah !');
        }



    }

    function logout(){
         Session::flush();
        return redirect('/login')->with('alert-success','Logout berhasil');
    }

    

    function register(){
        return view('front.register');
    }

    function register_act(Request $request){
        $request->validate([
            'username' => 'required|unique:user,username|max:255',
            'nama' => 'required',
            'umur' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $lastId=  DB::table('user')->insertGetId([
            'username' => $request->username,
            'password'=> bcrypt($request->password),
            'level'=> 2,
            'status' => 1
        ]);

        DB::table('user_detail')->insert([
            'user_id' => $lastId,
            'nama' =>$request->nama,
            'umur' =>$request->umur,
            'email' =>$request->email,
        ]);

        return redirect('/login')->with('alert-success','Silahkan Login');

    }

}
