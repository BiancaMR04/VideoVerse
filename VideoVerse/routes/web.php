<?php

use App\Http\Controllers\MeuCanalController;
use App\Models\Video;
use App\Models\Canal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroCanalController;
use App\Http\Controllers\AdminController;



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

//rotas da home
Route::get('/', 'VideoController@index')->name('visitante');
Route::get('/home', 'VideoController@index2')->name('home');
Route::get('/dashboard_adm', 'VideoController@index2')->name('dashboard_adm');

Route::view('/login', 'login')->name('login');

Route::view('/register', 'register')->name('register');

//rotas para monetizacao
Route::get('/monetizacao', 'MonetizacaoController@view')->name('monetizacao');
Route::post('/monetizacao', 'MonetizacaoController@cadastro')->name('monetizacao');

//rota para o cadastro de canal é /cadastro-canal
Route::get('/cadastro-canal', 'CadastroCanalController@view')->name('cadastro-canal');
Route::post('/cadastro-canal', 'CadastroCanalController@cadastrarCanal')->name('cadastrar_canal');

// Rota para a página de início após o login ou cadastro

Route::get('/criar_canal', 'CadastroCanalController@view')->name('criar_canal');

Route::view('/canal', 'HomeController@meuCanal')->name('canal');

//rotas para o upload de vídeos
Route::get('/upload_video', 'VideoController@showUploadForm')->name('video.uploadForm')->middleware('auth');
Route::post('/upload', 'VideoController@uploadVideo')->name('video.upload')->middleware('auth');
Route::get('/video/{id}', 'VideoController@showVideo')->name('video.show');

Auth::routes();

Auth::routes(['verify' => true]);

//rotas visualizar vídeo
Route::get('/videos/{id}', 'VideoController@show')->name('video.show');
Route::get('/videos/{video}', 'VideoController@showComment')->name('video.comment');
Route::post('/comment/store', 'VideoController@storeComment')->name('comment.store');

//videos curtidos
Route::post('/video/like/{id}', 'VideoController@likeVideo')->name('video.like')->middleware('auth');
Route::post('/video/like', 'VideoController@likeVideo')->name('video.like')->middleware('auth');
Route::get('/favoritos', 'VideoController@view_favoritos')->name('view_favoritos')->middleware('auth');

Route::post('/canal/inscrever-se', 'MeuCanalController@inscrever_se')->name('inscrever.se');
Route::get('/inscricoes', 'MeuCanalController@viewInscrições')->name('view.inscricoes')->middleware('auth');

Route::delete('/meu-canal/excluir-video/{videoId}', 'MeuCanalController@excluirVideo')->name('excluir.video');
//Route::get('/canal/{canalId}/videos', 'MeuCanalController@listarVideosDoCanal')->name('meu-canal');

Route::get('/canal/{canalId}', 'MeuCanalController@viewCanal')->name('view.canal');

Route::get('/meu-canal', 'MeuCanalController@view')->name('meu-canal')->middleware('auth');
Route::get('/criar-canal', [HomeController::class, 'criarCanal'])->name('criar-canal')->middleware('auth');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('/updateViewCount/{id}', 'VideoController@updateViewCount')->name('updateViewCount');

Route::get('/monetizacao', 'MonetizacaoController@index')->name('monetizacao.index');


Route::get('/videos/{id}', 'VideoController@show')->name('video.show')->where('id', '[0-9]+');
Route::post('/pesquisar', 'SearchController@pesquisar')->name('pesquisar');



Route::get('/monetizacao-cadastro', 'MonetizacaoController@cadastroView')->name('monetizacao_cadastro');
Route::post('/monetizacao-cadastro', 'MonetizacaoController@cadastro')->name('monetizacao_cadastro');

Route::post('/retirar-valor', 'MonetizacaoController@retirarValor')->name('retirar_valor');

Route::post('/video/{video}/favorite', 'VideoController@favorite')->name('video.favorite');

Route::get('/usuarios', 'admController@listaUsuarios')->name('lista.usuarios');
Route::delete('/usuarios/{id}', 'admController@excluirUsuario')->name('excluir.usuario');

