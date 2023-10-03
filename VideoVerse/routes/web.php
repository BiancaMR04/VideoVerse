<?php

use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
//Route::view('/', 'auth/login')->name('login');

Route::get('/', 'VideoController@index')->name('home');

//Route::view('/', 'home')->name('home');
Route::get('/videos/{id}', function ($id) {
    $video = Video::find($id);
    return view('view_video', compact('video'));
})->name('video.show');


Route::get('/login', 'LoginController@view')->name('login');
Route::post('/login', 'LoginController@login')-> name('login');

Route::view('/index', 'index');

Route::view('/socorro', 'view_video');

Route::view('/', 'auth.login')->name('login'); // Corrigi o nome da view para corresponder ao caminho padrão do Laravel

Route::view('/home-visitor', 'home_visitante')->name('home-visitor');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login'); // Alterado para usar o método padrão do Laravel
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/cadastro', 'CadastroController@cadastro')->name('cadastro');
Route::get('/cadastro', 'CadastroController@view')->name('cadastro');



Route::post('/cadastro', 'CadastroController@cadastro')-> name('cadastro');
Route::get('/cadastro', 'CadastroController@view')-> name('cadastro');


//rota para o cadastro de canal é /cadastro-canal
Route::get('/cadastro-canal', 'CadastroCanalController@view')->name('cadastro-canal');
Route::post('/cadastro-canal', 'CadastroCanalController@cadastrarCanal')->name('cadastrar_canal');

Route::get('/home', [HomeController::class, 'paginaInicial'])->name('pagina-inicial');
Route::view('/view_canal', 'view_canal')->name('view_canal');
Route::view('/upload_video', 'upload_video')->name('upload_video');

Route::get('/canal', 'HomeController@authenticated' )->name('meu-canal');
//rota par criar canal
Route::post('/canal', 'HomeController@authenticated' )->name('criar_canal');
