<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function curtirVideo(Request $request, $videoId)
    {
        Avaliacao::create([
            'video_id' => $videoId,
            'curtir' => true,
        ]);

        return redirect()->back()->with('success', 'Você curtiu este vídeo.');
    }

    public function comentarVideo(Request $request, $videoId)
    {
        Avaliacao::create([
            'video_id' => $videoId,
            'comentario' => $request->input('comentario'),
        ]);

        return redirect()->back()->with('success', 'Seu comentário foi adicionado.');
    }
}
