<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Canal;
use Illuminate\Http\Request;

class MonetizacaoController extends Controller
{
    public function index()
    {
        // Recuperar vídeos do usuário
        $user = auth()->user();
        $temCanal = Canal::where('user_id', auth()->id())->exists();
        $videosDoUsuario = Video::whereIn('canal_id', $user->canal()->pluck('id'))->get();

        if($videosDoUsuario->isEmpty()) {
            return view('monetizacao', [
                'videosDoUsuario' => $videosDoUsuario,
                'temCanal' => $temCanal,
            ]);
        }

        $somaVisualizacoes = $videosDoUsuario->sum('visualizacao');
        $valorTotal = $somaVisualizacoes * 0.15; // Valor de R$0,15 por visualização

        return view('monetizacao', [
            'videosDoUsuario' => $videosDoUsuario,
            'somaVisualizacoes' => $somaVisualizacoes,
            'valorTotal' => $valorTotal,
            'temCanal' => $temCanal,
        ]);
    }

    public function retirarValor()
    {
        // Enviar um email para usuário para informar que o valor foi retirado

        return redirect()->back()->with('success', 'Valor retirado com sucesso!');
    }

}
