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

        $palavras = explode(' ', $query);

        $canais = Canal::where(function ($queryBuilder) use ($palavras) {
            foreach ($palavras as $palavra) {
                $queryBuilder->orWhere('nome', 'ILIKE', "%$palavra%")
                            ->orWhere('descricao', 'ILIKE', "%$palavra%");
            }
        })->get();
        $videos = Video::where(function ($queryBuilder) use ($palavras) {
            foreach ($palavras as $palavra) {
                $queryBuilder->orWhere('titulo', 'ILIKE', "%$palavra%")
                            ->orWhere('descricao', 'ILIKE', "%$palavra%");
            }
        })->get();

        $publicVideos = Video::where('estado_video', 'publico')->get();
        return view('resultados', compact('canais', 'videos', 'publicVideos', 'query'));
    }

    public function renderResultados()
    {
        $publicVideos = Video::where('estado_video', 'publico')->get();
        return view('resultados', compact('publicVideos'));
    }
}
