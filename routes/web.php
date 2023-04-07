<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [homeController::class, 'index'])->name('home');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/login', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/dashboard', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
Route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');


Route::resource('admin',PegawaiController::class);



//HAK AKSES
Route::group(['middleware' => ['auth','ceklevel:admin,pegawai']], function () {
    Route::get('/dashboard', [LoginController::class, 'postlogin'])->name('postlogin');
});


/* Route::group(['middleware' => ['auth','ceklevel:admin,pegawai']], function () {
    Route::get('/admin', function()
    {
        return view('admin.Data-pegawai');
    });

    Route::get('/admin/create', function()
    {
        return view('admin.create-pegawai');
    });
}); */





