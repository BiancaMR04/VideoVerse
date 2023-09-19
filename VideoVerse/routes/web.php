<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;



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


Route::view('/', 'login')->name('home');

Route::view('/login', 'login')->name('login');

Route::view('/index', 'index')->name('home');

Route::view('/home', 'inicio_logado')->name('home');

Route::post('/cadastro', 'CadastroController@cadastro')-> name('cadastro');
Route::get('/cadastro', 'CadastroController@view')-> name('cadastro');

//Route::view('/cadastro/erro', 'cadastro_erro')->name('cadastro-erro');


/*
Route::get('/', function () {
    return redirect()->route('test-database'); // Redirecionamento para a rota nomeada 'test-database'
});
*/


Route::get('/test-database', function () {
    try {
        $results = DB::select('SELECT * FROM usuarios');
        return $results;
    } catch (\Exception $e) {
        return "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
})->name('test-database'); // Nomeie a rota como 'test-database'

