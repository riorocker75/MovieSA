<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\LoginAdminCtrl;
use App\Http\Controllers\LoginUserCtrl;


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

    // user`

    Route::post('/dashboard/admin/ajax/hapus-eps', [AdminCtrl::class,'hapus_eps']);
    Route::post('/dashboard/admin/ajax/hapus-cover', [AdminCtrl::class,'hapus_cover']);

    

});



// login untuk user di depan
Route::get('/login', [LoginUserCtrl::class,'index']);

Route::middleware(['userLogin'])->group(function () {
    
});

