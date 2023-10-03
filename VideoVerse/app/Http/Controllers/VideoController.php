<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Http\Response; 

class VideoController extends Controller
{
    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\View
     */

    public function categorias(){
        
        $categorias = Categoria::all();
        return view('videos.upload', ['categorias' => $categorias]);
    }
    public function upload(Request $request)
    {
        $arquivo_imagem = null;
        $arquivo_video = null;

        $video = new Video();

        $arquivo_imagem = $request->file('imagem');
        $request->validate([
            'imagem' => 'required|mimes:jpg,jpeg,png|max:2048',
            'vídeo' => 'required|mimes:mp4',
            'título' => 'required', // Adicione validação para o título
            'categorias' => 'required|array', // Adicione validação para as categorias
        ]);

        $arquivo_video = $request->file('vídeo');

        $caminho_imagem = '/vídeos/Miniaturas/';
        $caminho = '/vídeos/';

        $extensão = $arquivo_imagem->getClientOriginalExtension();
        $extensão = $arquivo_video->getClientOriginalExtension();
        $titulo = time() . '.' . $extensão;

        $video->titulo = $request->input('título');
        $video->video = $caminho . $titulo;
        $video->miniatura = $caminho_imagem;

        // Salva a imagem e o vídeo no diretório de armazenamento
        $arquivo_imagem->move(public_path() . $caminho_imagem, );
        $arquivo_video->move(public_path() . $caminho, $titulo);

        // Salva o vídeo no banco de dados
        $categorias = $request->input('categorias');
        $video->categorias = implode(', ', $categorias); // Armazena as categorias como uma string separada por vírgulas

        if ($video->save()) {
            printf("Vídeo salvo com sucesso!");
            return redirect()->route('videos.upload', $video->id);

        } else { 
            printf("Erro ao salvar o vídeo!");
            return redirect()->route('videos.upload');
        }
    }
}
