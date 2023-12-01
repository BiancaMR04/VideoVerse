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
Route::get('/home', 'VideoController@index')->name('home');

Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

//rotas para monetizacao
Route::get('/monetizacao', 'MonetizacaoController@view')->name('monetizacao')->middleware('auth');
Route::post('/monetizacao', 'MonetizacaoController@cadastro')->name('monetizacao')->middleware('auth');

//rota para o cadastro de canal é /cadastro-canal
Route::get('/cadastro-canal', 'CadastroCanalController@view')->name('cadastro-canal')->middleware('auth');
Route::post('/cadastro-canal', 'CadastroCanalController@cadastrarCanal')->name('cadastrar_canal')->middleware('auth');

Route::get('/criar_canal', 'CadastroCanalController@view')->name('criar_canal')->middleware('auth');

//rotas para o upload de vídeos
Route::get('/upload_video', 'VideoController@showUploadForm')->name('video.uploadForm')->middleware('auth');
Route::post('/upload', 'VideoController@uploadVideo')->name('video.upload')->middleware('auth');
Route::get('/video/{id}', 'VideoController@showVideo')->name('video.show');

Auth::routes();

Auth::routes(['verify' => true]);

//rotas visualizar vídeo
Route::get('/videos/{id}', 'VideoController@show')->name('video.show');
Route::get('/videos/{video}', 'VideoController@showComment')->name('video.comment');
Route::post('/comment/store', 'VideoController@storeComment')->name('comment.store')->middleware('auth');

//videos curtidos
Route::post('/video/like/{id}', 'VideoController@likeVideo')->name('video.like')->middleware('auth');
Route::post('/video/like', 'VideoController@likeVideo')->name('video.like')->middleware('auth');
Route::get('/favoritos', 'VideoController@view_favoritos')->name('view_favoritos')->middleware('auth');

Route::post('/canal/inscrever-se', 'MeuCanalController@inscrever_se')->name('inscrever.se')->middleware('auth');
Route::get('/inscricoes', 'MeuCanalController@viewInscrições')->name('view.inscricoes')->middleware('auth');

Route::delete('/meu-canal/excluir-video/{videoId}', 'MeuCanalController@excluirVideo')->name('excluir.video');
Route::get('/canal/excluir', 'MeuCanalController@excluirCanal')->name('excluir.canal')->middleware('auth');

Route::get('/excluir-conta', 'MeuCanalController@excluirConta')->name('excluir.conta')->middleware('auth');

Route::get('/canal/{canalId}', 'MeuCanalController@viewCanal')->name('view.canal');
Route::get('/meu-canal', 'MeuCanalController@meuCanal')->name('meu-canal')->middleware('auth');

Route::get('/meu-canal', 'MeuCanalController@view')->name('meu-canal')->middleware('auth');
Route::get('/criar-canal', [HomeController::class, 'criarCanal'])->name('criar-canal')->middleware('auth');

Route::get('/editar/{id}', 'CadastroCanalController@viewEditar')->name('editar_canal')->middleware('auth');
Route::post('/editar/{id}', 'CadastroCanalController@editarCanal')->name('editar_canal')->middleware('auth');

Route::post('/updateViewCount/{id}', 'VideoController@updateViewCount')->name('updateViewCount');

Route::get('/monetizacao', 'MonetizacaoController@index')->name('monetizacao.index');


Route::get('/videos/{id}', 'VideoController@show')->name('video.show')->where('id', '[0-9]+');
Route::post('/pesquisar', 'SearchController@pesquisar')->name('pesquisar');



Route::get('/monetizacao-cadastro', 'MonetizacaoController@cadastroView')->name('monetizacao_cadastro')->middleware('auth');
Route::post('/monetizacao-cadastro', 'MonetizacaoController@cadastro')->name('monetizacao_cadastro')->middleware('auth');

Route::post('/retirar-valor', 'MonetizacaoController@retirarValor')->name('retirar_valor');

Route::post('/video/{video}/favorite', 'VideoController@favorite')->name('video.favorite');

Route::get('/usuarios', 'admController@listaUsuarios')->name('lista.usuarios');
Route::delete('/usuarios/{id}', 'admController@excluirUsuario')->name('excluir.usuario');

Route::get('/gerenciar', 'admController@index')->name('gerenciar')->middleware('auth');
Route::post('/admy/{id}', 'admController@tornarAdm')->name('tornar.adm')->middleware('auth');
Route::post('/admn/{id}', 'admController@removerAdm')->name('remover.adm')->middleware('auth');

Route::get('/gerenciar-videos', 'admController@listaVideos')->name('lista.videos');
Route::delete('/excluir-video/{id}', 'admController@excluirVideo')->name('excluir.video');
