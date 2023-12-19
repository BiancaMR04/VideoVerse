<?php
namespace App\Http\Controllers;

use App\Events\NewComment;
use App\Models\Comentario;
use App\Models\Favorito;
use App\Models\Video;
use App\Models\User;
use App\Models\Historico;
use App\Models\Canal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        $publicVideos = Video::where('estado_video', 'publico')->get();
        return view('home', ['videos' => $videos], compact('publicVideos'));
    }

    public function view_favoritos()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login');
        }
    
        $videosFavoritos = $user->likedVideos;
        $favoritos = Favorito::where('user_id', $user->id)->get();
        return view('view_favoritos', compact('videosFavoritos', 'favoritos'));
    }    

    public function storeComment(Request $request, Video $video)
    {
        $user = auth()->user();

        // Verifica se o usuário tem um canal
        if ($user->canal) {
            $comment = new Comentario();
            $comment->body = $request->input('body');
            $comment->user_id = auth()->id();
            $comment->video_id = $request->input('video_id');
            $comment->save();
            event(new NewComment($comment));
            return redirect()->back();
        }

        return redirect()->route('criar_canal'); 
    }

    public function comments()
    {
        return $this->hasMany(Comentario::class);
    }


    public function show($id)
    {
        $video = Video::find($id);
        $comments = $video->comments;

        // Recupere o canal associado a este vídeo
        $canal = $video->canal;

        return view('view_video', compact('video', 'comments', 'canal'));
    }

    public function updateViewCount($id)
    {
        $video = Video::find($id);
        $video->visualizacao += 1;
        $video->save();
        return response()->json(['message' => 'Visualizações atualizadas com sucesso']);
    }

    public function uploadVideo(Request $request)
    {
        if ($request->hasFile('upload_video') && $request->hasFile('foto-video')) {
            if ($request->file('upload_video')->isValid() && $request->file('foto-video')->isValid()) {
                $nomeArquivoVideo = $request->file('upload_video')->getClientOriginalName();
                $nomeArquivoImagem = $request->file('foto-video')->getClientOriginalName();

                $caminhoDestinoVideo = 'videos/' . $nomeArquivoVideo;
                $caminhoDestinoImagem = 'thumbnails/' . $nomeArquivoImagem;
                
                if (
                    $request->file('upload_video')->move(public_path('videos'), $nomeArquivoVideo) &&
                    $request->file('foto-video')->move(public_path('thumbnails'), $nomeArquivoImagem)
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
                        $video->likes = 0;
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

        return view('upload_video')->with('msg', $msg);
    }


    public function showUploadForm()
    {
        return view('upload_video');
    }

    public function likeVideo(Request $request)
    {
        $videoId = $request->input('video_id');
        $user = auth()->user();

        $isFavorito = Favorito::where('user_id', $user->id)->where('video_id', $videoId)->first();

        if ($isFavorito){
            Favorito::where('user_id', $user->id)->where('video_id', $videoId)->delete();
    
            $video = Video::find($videoId);
            $video->likes -= 1;
            $video->save();
            $numeroCurtidas = Video::find($videoId)->likes;
            $mensagem = 'Vídeo descurtido com sucesso!';
            return response()->json(['likes' => $numeroCurtidas, 'mensagem' => $mensagem]);
        } else {
            Video::where('id', $videoId)->increment('likes');

            $like = new Favorito();
            $like->video_id = $videoId;
            $like->user_id = $user->id;
            $like->save();
            $numeroCurtidas = Video::find($videoId)->likes;
            $mensagem = 'Vídeo curtido com sucesso!';

            return response()->json(['likes' => $numeroCurtidas, 'mensagem' => $mensagem]);
        }
    }

    public function exibirVideo($id)
{
    // Lógica para recuperar o vídeo com ID $id
    $video = Video::findOrFail($id);

    // Registra o histórico
    //auth()->user()->historico()->create([
        //'video_id' => $video->id,
        // Outros campos do histórico, se necessário
   // ]);

    // Lógica para exibir o vídeo
    return view('videos.exibir', compact('video'));
}
}