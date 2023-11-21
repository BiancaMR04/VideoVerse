<?php

namespace App\Http\Controllers;

use App\Models\Seguidor;
use App\Models\Video;
use App\Models\Canal; 
use Carbon\Carbon;
use Illuminate\Http\Request;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\User;

require __DIR__ . '/../../../vendor/autoload.php';

class MeuCanalController extends Controller
{
    public function view()
    {
        // Busque os dados do canal do usuário autenticado (ou como desejar obtê-los)
        $canal = Canal::where('user_id', auth()->id())->first();
        $videos = Video::where('canal_id', $canal->id)->get();

        return view('meu_canal', compact('canal', 'videos'));
    }

    public function viewCanal($canalId)
    {
        $canal = Canal::where('id', $canalId)->first();
        $videos = Video::where('canal_id', $canal->id)->get();

        $user = auth()->user();
        if(auth()->check() && $user->canal->id == $canalId){
            return view('meu_canal', compact('canal', 'videos'));
        }
        return view('view_canal', compact('canal', 'videos'));
    }

    public function viewInscrições()
    {
        $user = auth()->user();
        $canaisInscritos = $user->subscribedChannels;
        $inscricoes = Seguidor::where('user_id', $user->id)->get();
        return view('view_inscricoes', compact('canaisInscritos', 'inscricoes'));
    }

    public function excluirVideo($videoId)
    {
        // Certifique-se de verificar se o vídeo pertence ao usuário autenticado
        $video = Video::find($videoId);
        
        if ($video && $video->canal->user_id === auth()->id()) {
            // Execute a lógica de exclusão do vídeo
            $video->delete();
            
            // Redirecione de volta para a página do canal
            return redirect()->route('meu-canal');
        } else {
            // Retorne uma resposta de erro ou redirecione para uma página de erro
            return redirect()->route('pagina.erro');
        }
    }

    public function inscrever_se(Request $request)
    {
        $canalId = $request->input('canal_id');
        $user = auth()->user();

        $inscrito = Seguidor::where('user_id', $user->id)->where('canal_id', $canalId)->first();

        if ($inscrito){
            // Remove a curtida
            Seguidor::where('user_id', $user->id)->where('canal_id', $canalId)->delete();
    
            // Decrementa o número de likes no vídeo
            $canal = Canal::find($canalId);
            $canal->inscritos -= 1;
            $canal->save();
            $inscritos = Canal::find($canalId)->inscritos;
            $mensagem = 'Deixou de seguir';

            return response()->json(['inscritos' => $inscritos, 'mensagem' => $mensagem]);
        } else {
            Canal::where('id', $canalId)->increment('inscritos');

            $seguidor = new Seguidor();
            $seguidor->canal_id = $canalId;
            $seguidor->user_id = $user->id;
            $seguidor->save();
            $inscritos = Canal::find($canalId)->inscritos;
            $mensagem = 'Seguiu';

            return response()->json(['inscritos' => $inscritos, 'mensagem' => $mensagem]);
        }
    }
    
}
