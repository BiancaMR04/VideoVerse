<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canal;
use App\Models\Video;

class SearchController extends Controller
{
    public function pesquisar(Request $request)
    {
        $query = $request->input('query');

        // Pesquisa por canais e vídeos com base na consulta
        $canais = Canal::where('nome', 'LIKE', "%$query%")->get();
        $videos = Video::where('titulo', 'LIKE', "%$query%")->get();

        return view('resultados', compact('canais', 'videos', 'query'));
    }
    

    public function renderResultados()
    {
        $temCanal = Canal::where('user_id', auth()->id())->exists();

        // Obtenha vídeos públicos
        $publicVideos = Video::where('estado_video', 'publico')->get();

        return view('resultados', compact('temCanal', 'publicVideos'));
    }
}
