<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
<<<<<<< Updated upstream
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CadastroCanalController;
=======
use Illuminate\Support\Facades\Auth; // Adicionei o ponto e vírgula aqui
>>>>>>> Stashed changes

Route::view('/', 'auth.login')->name('login'); // Corrigi o nome da view para corresponder ao caminho padrão do Laravel

<<<<<<< Updated upstream

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
Route::view('/', 'index')->name('home');

Route::view('/', 'home')->name('home');
=======
Route::view('/home-visitor', 'home_visitante')->name('home-visitor');
>>>>>>> Stashed changes

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login'); // Alterado para usar o método padrão do Laravel
Route::post('/login', 'Auth\LoginController@login')->name('login');

<<<<<<< Updated upstream
Route::view('/index', 'index');

=======
Route::post('/cadastro', 'CadastroController@cadastro')->name('cadastro');
Route::get('/cadastro', 'CadastroController@view')->name('cadastro');
>>>>>>> Stashed changes

// Rota para o cadastro de canal é /cadastro-canal
Route::get('/cadastro-canal', [HomeController::class, 'cadastroCanal'])->name('cadastro-canal');
Route::post('/cadastro-canal', 'CadastroCanalController@cadastrarCanal')->name('cadastrar_canal');

Route::get('/home', [HomeController::class, 'paginaInicial'])->name('pagina-inicial');
Route::view('/view_canal', 'view_canal')->name('view_canal');
<<<<<<< Updated upstream

//Route::view('/cadastro/erro', 'cadastro_erro')->name('cadastro-erro');

Route::get('/test-database', function () {
    try {
        $results = DB::select('SELECT * FROM usuarios');
        return $results;
    } catch (\Exception $e) {
        return "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
})->name('test-database'); // Nomeie a rota como 'test-database'

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->canal) {
            return view('inicio_logado');
        } else {
            return view('inicio_logado_SC');
        }
    })->name('dashboard');
});
=======
Route::view('/upload_video', 'upload_video')->name('upload_video');
>>>>>>> Stashed changes


<<<<<<< Updated upstream
=======
Route::get('/canal', 'HomeController@authenticated' )->name('meu-canal');
//rota par criar canal
Route::post('/canal', 'HomeController@authenticated' )->name('criar_canal');
>>>>>>> Stashed changes
