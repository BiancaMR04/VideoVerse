<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'video' => 'required|mimetypes:video/*',
        ]);

        $titulo = $request->input('titulo');
        $videoFile = $request->file('video');

        // Realize o upload do vídeo e armazene-o em um diretório
        $caminho = $videoFile->store('videos', 'public');

        // Redirecione de volta ao formulário de envio com uma mensagem de sucesso
        return redirect()->route('videos.create')->with('success', 'Vídeo enviado com sucesso!');
    }
}
