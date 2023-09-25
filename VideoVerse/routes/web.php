<?php

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
Route::view('/', 'index')->name('home');

Route::get('/login', 'LoginController@view')->name('login');
Route::post('/login', 'LoginController@login')-> name('login');


Route::post('/cadastro', 'CadastroController@cadastro')-> name('cadastro');
Route::get('/cadastro', 'CadastroController@view')-> name('cadastro');

//rota para o cadastro de canal é /cadastro-canal
Route::get('/cadastro-canal', 'CadastroCanalController@view')->name('cadastro-canal');
Route::post('/cadastro-canal', 'CadastroCanalController@cadastrarCanal')->name('cadastrar_canal');

// Rota para a página de início após o login ou cadastro




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


