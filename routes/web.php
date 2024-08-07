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
});

// login untuk user di depan
Route::get('/login', [LoginUserCtrl::class,'index']);

Route::middleware(['userLogin'])->group(function () {
    
});

