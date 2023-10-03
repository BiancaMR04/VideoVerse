<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroCanalController;
use Illuminate\Support\Facades\Auth;

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
