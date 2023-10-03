<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Canal;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // ou qualquer outra visão que você deseja exibir como a página inicial
    }
    
    public function paginaInicial()
{
    $user = Auth::user();
    $canal = Canal::where('user_id', $user->id)->first();

    if ($canal) {
        // Se o usuário tem um canal, redireciona para a página do canal
        return view('meu_canal');
    } else {
        // Se o usuário não tem um canal, redireciona para a página de criação de canal
        return view('criar_canal');
    }
}

}
