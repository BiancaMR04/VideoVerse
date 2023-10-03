<?php

namespace App\Http\Controllers;

use App\Models\Canal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    return view('home');
}

public function authenticated($request, $user)
{
    // Verificar se o usuário tem um canal associado ao perfil
    $canal = Canal::where('user_id', $user->id)->first();

    if ($canal) {
        // Se o usuário tiver um canal, redirecione para a rota nomeada 'meu-canal'
        return redirect()->route('meu_canal');
    } else {
        // Se o usuário não tiver um canal, redirecione para a rota nomeada 'cadastro-canal'
        return redirect()->route('cadastro-canal');
    }
}



public function paginaInicial()
{
    $user = User::find(Auth::id());

    if ($user && $user->imagem_perfil) {
        $profileImageName = $user->imagem_perfil;
    } else {
        $profileImageName = 'default.jpg';
    }

    return view('home', ['profileImageName' => $profileImageName]);
}



}
