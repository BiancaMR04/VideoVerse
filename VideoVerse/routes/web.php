<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
// classe Home chamando a função index
Route::get('/', [HomeController::class,'index']);

Route::controller(LoginController::class)->group(function(){
    //rota do formulário de login
    Route::get('/entrar', 'index')-> name('entrar.index');
    //entrar na conta do usuario
    Route::post('/entrar', 'visualizar')-> name('entrar.visualizar');
    //sair da conta do usuario
    Route::get('/sair', 'destruir')-> name('entrar.destruir');
});

Route::get('/test-database', function () {
    try {
        $results = DB::select('SELECT * FROM usuarios');
        return $results;
    } catch (\Exception $e) {
        return "Erro ao conectar ao banco de dados: " . $e->getMessage();
    }
})->name('test-database'); // Nomeie a rota como 'test-database'

