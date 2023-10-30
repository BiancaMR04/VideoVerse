<?php
namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Video;
use App\Models\Canal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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

    public function storeComment(Request $request, Video $video)
    {
        $user = auth()->user();
    
        if ($user->canal) {
            $comment = new Comentario();
            $comment->body = $request->input('body');
            $comment->user_id = auth()->id();
            $comment->video_id = $request->input('video_id');
            $comment->save();
            return redirect()->back();
        }
    
        return view('/cadastro-canal');
    }


    public function show($id)
    {
        $video = Video::find($id);
        $temCanal = Canal::where('user_id', auth()->id())->exists();
        $comments = $video->comments;

        return view('view_video', compact('video', 'temCanal', 'comments'));
    }

    public function updateViewCount(Video $video) {
        $video->increment('views');
        return response()->json(['message' => 'View count updated']);
    }

public function uploadVideo(Request $request)
{
    // Verifica se o formulário foi enviado
    if ($request->hasFile('upload_video') && $request->hasFile('foto-video')) {
        // Verifica se os arquivos são válidos
        if ($request->file('upload_video')->isValid() && $request->file('foto-video')->isValid()) {
            // Obtém os nomes dos arquivos dos vídeos e das imagens
            $nomeArquivoVideo = $request->file('upload_video')->getClientOriginalName();
            $nomeArquivoImagem = $request->file('foto-video')->getClientOriginalName();

            // Move os vídeos e imagens para a pasta de uploads
            $caminhoDestinoVideo = 'videos/' . $nomeArquivoVideo;
            $caminhoDestinoImagem = 'thumbnails/' . $nomeArquivoImagem;
            
            if (
                $request->file('upload_video')->move(public_path('videos'), $nomeArquivoVideo) &&
                $request->file('foto-video')->move(public_path('thumbnails'), $nomeArquivoImagem,)
            ) {
                $tituloVideo = $request->input('titulo_video');
                $descricao = $request->input('descricao');
                $privacidade = $request->input('privacidade');

                /*
                if (empty($tituloVideo) || empty($descricao) || empty($privacidade)) {
                    $msg = 'Todos os campos devem ser preenchidos!';
                    return redirect()->route('video.uploadForm')->with('error', $msg);
                }

                try {
                    */
                    // Criando uma instância de Video e preenchendo com os dados do formulário
                    $video = new Video();
                    $video->titulo = $tituloVideo;
                    $video->descricao = $descricao;
                    $video->caminho = $caminhoDestinoVideo;
                    $video->caminho_imagem = $caminhoDestinoImagem;
                    $video->data = now();
                    $video->canal_id = auth()->user()->canal->id;
                    $video->visualizacao = 0;
                    $video->estado_video = $privacidade;

                    // Salva o vídeo no banco de dados
                    $video->save();

                    return redirect()->route('video.show', $video->id)->with('success', 'Vídeo enviado com sucesso!');
                /*} catch (\Exception $e) {
                    // Em caso de erro, volta para o formulário de upload com uma mensagem de erro
                    $msg = 'Erro ao processar o upload do vídeo: ' . $e->getMessage();
                    return redirect()->route('video.uploadForm')->with('error', $msg);
                }*/
            } else {
                $msg = "Ocorreu um erro ao fazer o upload dos vídeos e imagens.";
            }
        } else {
            $msg = "Arquivos de vídeo e imagem inválidos.";
        }
    } else {
        $msg = "Nenhum arquivo de vídeo ou imagem enviado.";
    }

    return redirect()->route('video.uploadForm')->with('error', $msg);
}


    public function showUploadForm()
    {
        return view('upload_video');
    }




    public function cadastro(Request $request)
    {
        if ($request->hasFile('upload_video') && $request->hasFile('foto-video')) {
            // Verifica se os arquivos são válidos
            if ($request->file('foto-video')->isValid() && $request->file('upload_file')->isValid()) {
                // Obtém os nomes dos arquivos das imagens de perfil e de fundo
                $nomeArquivoVideo = $request->file('upload_video')->getClientOriginalName();
                $nomeArquivoImagem = $request->file('foto-video')->getClientOriginalName();
    
                // Move as imagens para a pasta de uploads
                $caminhoDestinoPerfil = public_path('videos') . '/' . $nomeArquivoVideo;
                $caminhoDestinoFundo = public_path('thumbnails') . '/' . $nomeArquivoImagem;
    
                if (
                    $request->file('upload_video')->move(public_path('videos'), $nomeArquivoVideo) &&
                    $request->file('foto-video')->move(public_path('thumbnails'), $nomeArquivoImagem)
                ) {
    
                    $titulo = $request->input('titulo_video');
                    $descricao = $request->input('descricao');
                    $privacidade = $request->input('privacidade');
    
                    if (empty($nomeCanal) || empty($descricao)) {
                        $msg = 'Todos os campos devem ser preenchidos!';
                        return view('criar_canal', ['msg' => $msg]);
                    }
    
                    try {
                        $video = new Video();
                        $video->titulo = $request->input('titulo_video');
                        $video->descricao = $request->input('descricao');
                        $video->caminho = $nomeArquivoVideo;
                        $video->caminho_imagem = $nomeArquivoImagem;
                        $video->data = now();
                        $video->estado_video = $request->input('privacidade');
                        $video->canal_id = auth()->user()->canal->id;
    
                        // Salva o canal no banco de dados
                        $video->save();
    
                        // Redireciona para a home
                        $temCanal = Canal::where('user_id', auth()->id())->exists();
                        $videos = Video::all();
                        return view('home', compact('temCanal', 'videos'));
                    } catch (\Exception $e) {
                        // Em caso de erro, volta para o formulário de cadastro com uma mensagem de erro
                        $msg = 'Erro ao processar upload de vídeo: ' . $e->getMessage();
                        return view('criar_canal', ['msg' => $msg]);
                    }
                } else {
                    $msg = "Ocorreu um erro ao fazer o upload do vídeo ou imagem.";
                }
            } else {
                $msg = "Arquivos de imagem inválidos.";
            }
        } else {
            $msg = "Nenhum arquivo de imagem enviado.";
        }
    
        return view('home', ['msg' => $msg]);
    }

}