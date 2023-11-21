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
         $publicVideos = Video::where('estado_video', 'publico')->get();
         $publicVideos = $publicVideos->sortByDesc('visualizacao');
         return view('home', compact('publicVideos'));
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
