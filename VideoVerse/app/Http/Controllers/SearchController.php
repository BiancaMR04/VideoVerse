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

    $canais = Canal::where('nome', 'LIKE', "%$query%")->get();
    $videos = Video::where('titulo', 'LIKE', "%$query%")->get();

    return view('resultados', compact('canais', 'videos'));
}

public function renderResultados()
{
    $temCanal = Canal::where('user_id', auth()->id())->exists();
    
    return view('resultados', compact('temCanal'));
}



}
