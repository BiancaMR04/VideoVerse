<?php
namespace App\Http\Controllers;

use App\Models\Comentario;
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
        $request->validate([
            'titulo_video' => 'required',
            'descricao' => 'required',
            'upload_video' => 'required|mimetypes:video/*', // Verifique se é um arquivo de vídeo
            'foto-video' => 'required|image', // Verifique se é uma imagem
            // Adicione outras regras de validação conforme necessário
        ]);

        // Salve o vídeo e a imagem no servidor
        $videoPath = $request->file('upload_video')->store('videos', 'public');
        $imagePath = $request->file('foto-video')->store('thumbnails', 'public');

        // Crie um novo registro de vídeo
        $video = new Video;
        $video->title = $request->input('titulo_video');
        $video->description = $request->input('descricao');
        $video->video_path = $videoPath;
        $video->image_path = $imagePath;
        $video->date_posted = now(); // Pode ser personalizado
        $video->channel_id = auth()->user()->canal->id; 

        // Adicione outros campos, como duração e estado do vídeo, conforme necessário
        $video->save();

        return redirect()->route('video.show', $video->id);
    }

    public function showUploadForm()
    {
        return view('upload_video');
    }

}