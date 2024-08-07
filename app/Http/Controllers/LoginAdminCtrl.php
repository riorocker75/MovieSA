<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use App\Models\Users;


class LoginAdminCtrl extends Controller
{
    
    public function index(){
        return view('login_admin');
    }
    
    function cek_login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = Users::where('username',$username)->first();

        if($data){
           if($data->level == "1"){
            Session::flush();
                
                if(Hash::check($password,$data->password)){
                    Session::put('adm_username', $data->username);
                    Session::put('level', 1);
                    Session::put('login-adm',TRUE);
                    return redirect('/dashboard')->with('alert-success','Selamat Datang Kembali Admin');
                }else{
                    return redirect('/login/admin')->with('alert-danger','Password atau Email, Salah !');
                }
           }

        }else{
            return redirect('/login/admin')->with('alert-danger','Password atau Email, Salah !');
        }



    }

    function logout(){
         Session::flush();
        return redirect('/login/admin')->with('alert-success','Logout berhasil');
    }



}
