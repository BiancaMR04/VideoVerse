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
        return view('carregar_video', ['categorias' => $categorias]);
    }
    public function carregar(Request $request)
    {
        $arquivo_imagem = null;
        $arquivo_video = null;

        $video = new Video();

        $arquivo_imagem = $request->file('caminho_imagem');
        $request->validate([
            'caminho_imagem' => 'required|mimes:jpg,jpeg,png|max:2048',
            'caminho' => 'required|mimes:mp4',
            'titulo' => 'required', // Adicione validação para o título
            'categoria' => 'required|array', // Adicione validação para as categorias
        ]);

        $arquivo_video = $request->file('caminho');

        $caminho_imagem = 'thumbnails/';
        $caminho = 'videos/';

        $extensao = $arquivo_imagem->getClientOriginalExtension();
        $extensao = $arquivo_video->getClientOriginalExtension();
        $titulo = time() . '.' . $extensao;

        $video->titulo = $request->input('titulo');
        $video->caminho = $caminho . $titulo;
        $video->caminho_imagem = $caminho_imagem;

        // Salva a imagem e o vídeo no diretório de armazenamento
        $arquivo_imagem->move(public_path() . $caminho_imagem, );
        $arquivo_video->move(public_path() . $caminho, $titulo);

        // Salva o vídeo no banco de dados
        $categorias = $request->input('categoria');
        $video->categorias = implode(', ', $categorias); // Armazena as categorias como uma string separada por vírgulas

        if ($video->save()) {
            printf("Vídeo salvo com sucesso!");
            return redirect()->route('videos.upload', $video->id);

        } else { 
            printf("Erro ao salvar o vídeo!");
            return redirect()->route('videos.upload');
        }

    }
   
    public function index()
    {
        $videos = Video::all();

        return view('home_visitante', ['videos' => $videos]);
    }

    public function show($id)
    {
    $video = Video::find($id);

    if (!$video) {
        abort(404); 
    }

    return view('view_video', compact('video'));
    }


    public function teste(Request $request){

            $video = $request->file('video');
            $videoNome = $video->getClientOriginalName();
            $video->storeAs('public/videos', $videoNome);
        
          $categoriasSelecionadas = $request->input('categorias');
            $categoriasString = '';
        
            if (is_array($categoriasSelecionadas)) {
                $categoriasString = implode(',', $categoriasSelecionadas);
            }
    
        
            // Salvar no banco de dados
            $videoModel = new Video();
            $videoModel->titulo = $request->input('titulo');
            $videoModel->descricao = $request->input('descricao');
            $videoModel->categorias = $categoriasString; // Armazena a string de IDs separada por vírgulas
            $videoModel->video = $videoNome;
            $videoModel->save();
            // Faça o upload das thumbnails
                if ($request->hasFile('thumbnails')) {
                    foreach ($request->file('thumbnails') as $thumbnail) {
                        $thumbnailNome = $thumbnail->getClientOriginalName();
                        $thumbnail->storeAs('public/thumbnails', $thumbnailNome);
        
                        // Salve informações das thumbnails no banco de dados se necessário
                    }
                
        
                return redirect('/')->with('success', 'Vídeo enviado com sucesso.');
            }
            else {
                return redirect('/')->with('error', 'Erro ao enviar o vídeo.');
            }
        }
    }
