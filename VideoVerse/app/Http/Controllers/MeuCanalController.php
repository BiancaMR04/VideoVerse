<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Supabase\SupabaseClient;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use App\Models\User;

require __DIR__ . '/../../../vendor/autoload.php';

use App\Models\Canal; // Certifique-se de importar o modelo Canal

class MeuCanalController extends Controller
{
    public function view()
    {
        // Busque os dados do canal do usuário autenticado (ou como desejar obtê-los)
        $canal = Canal::where('user_id', auth()->id())->first();
        $temCanal = Canal::where('user_id', auth()->id())->exists();

        return view('meu_canal', compact('canal', 'temCanal'));
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
}
