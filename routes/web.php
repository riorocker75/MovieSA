<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\LoginAdminCtrl;
use App\Http\Controllers\LoginUserCtrl;
use App\Http\Controllers\FrontCtrl;
use App\Models\Users;
use App\Models\Film;
use App\Models\BlogPost;



Route::get('/login/admin', [LoginAdminCtrl::class,'index']);
Route::post('/login/admin/cek', [LoginAdminCtrl::class,'cek_login']);

Route::get('/logout/admin', [LoginAdminCtrl::class,'logout']);

// admin
Route::middleware(['adminLogin'])->group(function () {
    Route::get('/dashboard', [AdminCtrl::class,'index']);
    // post
    Route::get('/dashboard/admin/all/post', [AdminCtrl::class,'all_post']);

    // movie
    Route::get('/dashboard/admin/movie_post/add', [AdminCtrl::class,'movie_post_add']);
    Route::post('/dashboard/admin/movie_post/act', [AdminCtrl::class,'movie_post_act']);

    Route::get('/dashboard/admin/movie_post/edit/{id}', [AdminCtrl::class,'movie_post_edit']);
    Route::post('/dashboard/admin/movie_post/update', [AdminCtrl::class,'movie_post_update']);
    Route::get('/dashboard/admin/movie_post/delete/{id}', [AdminCtrl::class,'movie_post_delete']);

    // blog
    Route::get('/dashboard/admin/blog_post/add', [AdminCtrl::class,'blog_post_add']);
    Route::post('/dashboard/admin/blog_post/act', [AdminCtrl::class,'blog_post_act']);

    Route::get('/dashboard/admin/blog_post/edit/{id}', [AdminCtrl::class,'blog_post_edit']);
    Route::post('/dashboard/admin/blog_post/update', [AdminCtrl::class,'blog_post_update']);
    Route::get('/dashboard/admin/blog_post/delete/{id}', [AdminCtrl::class,'blog_post_delete']);

    // all cat
    Route::get('/dashboard/admin/categori/all', [AdminCtrl::class,'cat_data']);

    // cat movie
    Route::post('/dashboard/admin/cat_movie/act', [AdminCtrl::class,'cat_movie_act']);
    Route::post('/dashboard/admin/cat_movie/update', [AdminCtrl::class,'cat_movie_update']);
    Route::get('/dashboard/admin/cat_movie/delete/{id}', [AdminCtrl::class,'cat_movie_delete']);

    // cat blog
    Route::post('/dashboard/admin/cat_blog/act', [AdminCtrl::class,'cat_blog_act']);
    Route::post('/dashboard/admin/cat_blog/update', [AdminCtrl::class,'cat_blog_update']);
    Route::get('/dashboard/admin/cat_blog/delete/{id}', [AdminCtrl::class,'cat_blog_delete']);


    // user
    Route::get('/dashboard/admin/user/data', [AdminCtrl::class,'user_data']);


    Route::post('/dashboard/admin/ajax/hapus-eps', [AdminCtrl::class,'hapus_eps']);
    Route::post('/dashboard/admin/ajax/hapus-cover', [AdminCtrl::class,'hapus_cover']);
    Route::post('/dashboard/admin/ajax/hapus-cover-post', [AdminCtrl::class,'hapus_cover_post']);

    // cek judul
    Route::get('/movie/check-judul', function (\Illuminate\Http\Request $request) {
        $judul = $request->query('judul');
        $exists = Film::where('judul', $judul)->exists();
        return response()->json(['exists' => $exists]);
    });

    Route::get('/blog/check-judul', function (\Illuminate\Http\Request $request) {
        $judul = $request->query('judul');
        $exists = BlogPost::where('judul', $judul)->exists();
        return response()->json(['exists' => $exists]);
    });

});




// front web`

Route::get('/', [FrontCtrl::class,'index']);

// login untuk user di depan
Route::get('/login', [LoginUserCtrl::class,'index']);
Route::post('/login/user/cek', [LoginUserCtrl::class,'cek_login']);
Route::get('/logout', [LoginUserCtrl::class,'logout']);

// register
Route::get('/register', [LoginUserCtrl::class,'register']);
Route::post('/register/user/cek', [LoginUserCtrl::class,'register_act']);

//movie all
Route::get('/movies/all', [FrontCtrl::class,'movie_data']);

// blog all
Route::get('/news/all', [FrontCtrl::class,'blog_data']);
Route::get('/news/single/{slug}', [FrontCtrl::class,'blog_detail']);

// cari
Route::get('/movie/search', [FrontCtrl::class,'cari_movie']);
Route::get('/blog/search', [FrontCtrl::class,'cari_blog']);


Route::get('/check-username', function (\Illuminate\Http\Request $request) {
    $username = $request->query('username');
    $exists = Users::where('username', $username)->exists();
    return response()->json(['exists' => $exists]);
});


Route::middleware(['userLogin'])->group(function () {
    // single play movie
    Route::get('/user/movie/play/{slug}', [FrontCtrl::class,'play_movie']);
     
});

