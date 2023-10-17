<?php

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroCanalController;



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
Route::get('/', 'VideoController@index')->name('home');
Route::get('/home', 'VideoController@index2')->name('home');
Route::view('/home-visitor', 'home_visitante')->name('home-visitor');

Route::view('/login', 'login')->name('login');

Route::post('/cadastro', 'CadastroController@cadastro')-> name('cadastro');
Route::get('/cadastro', 'CadastroController@view')-> name('cadastro');

//rotas para monetizacao
Route::get('/monetizacao', 'MonetizacaoController@view')->name('monetizacao');
Route::post('/monetizacao', 'MonetizacaoController@cadastro')->name('monetizacao');

//rota para o cadastro de canal é /cadastro-canal
Route::get('/cadastro-canal', 'CadastroCanalController@view')->name('cadastro-canal');
Route::post('/cadastro-canal', 'CadastroCanalController@cadastrarCanal')->name('cadastrar_canal');

// Rota para a página de início após o login ou cadastro

Route::get('/criar_canal', 'CadastroCanalController@view')->name('criar_canal');

Route::view('/view_canal', 'view_canal')->name('view_canal');

Route::view('/upload_video', 'upload_video')->name('upload_video');
Auth::routes();

Auth::routes();

Route::get('/videos/{id}', function ($id) {
    $video = Video::find($id);
    return view('view_video', compact('video'));
})->name('video.show');

Route::get('/meu-canal', 'MeuCanalController@view')->name('meu-canal')->middleware('auth');
Route::get('/criar-canal', [HomeController::class, 'criarCanal'])->name('criar-canal')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


