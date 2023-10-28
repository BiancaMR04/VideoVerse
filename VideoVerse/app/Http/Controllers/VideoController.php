<?php
namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Canal;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('home_visitante', ['videos' => $videos]);
    }

    public function index2()
    {
        $videos = Video::all();
        $temCanal = Canal::where('user_id', auth()->id())->exists();

        return view('home', ['videos' => $videos], compact('temCanal'));
    }

    public function show($id)
    {
        $video = Video::find($id);
        $temCanal = Canal::where('user_id', auth()->id())->exists();

        return view('view_video', ['video' => $video], compact('temCanal')); 
    }

    public function updateViewCount(Video $video) {
        $video->increment('views');
        return response()->json(['message' => 'View count updated']);
    }

    public function listarVideosDoCanal($canalId)
{
    // Recupera o canal com base no ID
    $canal = Canal::find($canalId);

    if (!$canal) {
        // caso canal não encontrado
        return redirect()->route('pagina.erro');
    }

    // Recupera todos os vídeos pertencentes ao canal
    $videos = Video::where('canal_id', $canal->id)->get();

    return view('meu_canal', compact('canal', 'videos'));
}

}