<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroCanalController;
use Illuminate\Support\Facades\Auth;



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
Route::view('/', 'auth/login')->name('login');
Route::view('/home-visitor', 'home_visitante')->name('home-visitor');

Route::get('/login', 'LoginController@view')->name('login');
Route::post('/login', 'LoginController@login')-> name('login');


Route::post('/cadastro', 'CadastroController@cadastro')-> name('cadastro');
Route::get('/cadastro', 'CadastroController@view')-> name('cadastro');

Route::get('/meu_canal', 'MeuCanalController@view')->name('meu_canal');

Route::view('/view_canal', 'view_canal')->name('view_canal');

Route::view('/upload_video', 'upload_video')->name('upload_video');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
