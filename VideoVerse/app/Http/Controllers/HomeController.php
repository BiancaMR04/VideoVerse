<?php

namespace App\Http\Controllers;

use App\Models\Canal;
use App\Models\Video;
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
         $temCanal = Canal::where('user_id', auth()->id())->exists();
         $publicVideos = Video::where('estado_video', 'publico')->get();
         return view('home', compact('temCanal', 'publicVideos')); // Alterado de 'publico' para 'publicVideos'
     }
     

    public function meuCanal()
    {
        // Lógica para obter informações do canal do usuário
        $userCanal = Canal::where('user_id', auth()->id())->first();

        // Verifique se o canal do usuário existe
        if ($userCanal) {
            // Se o canal existe, você pode passar os dados do canal para a view
            return view('meu_canal', compact('userCanal'));
        } else {
            // Se o canal não existe, você pode redirecionar o usuário para a página de criação do canal
            return redirect()->route('criar_canal');

        }
    }
    public function criarCanal()
    {
        // Lógica para verificar se o usuário já possui um canal
        $temCanal = Canal::where('user_id', auth()->id())->exists();

        // Se o usuário já possui um canal, redirecione para a página do seu canal
        if ($temCanal) {
            return redirect()->route('meu-canal');
        }

        // Se o usuário não possui um canal, redirecione para a página de criação de canal
        return view('criar_canal');
    }


}
