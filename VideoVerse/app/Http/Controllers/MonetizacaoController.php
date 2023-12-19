<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Canal;
use App\Models\Monetizacao;
use Illuminate\Http\Request;

class MonetizacaoController extends Controller
{
    public function index()
{
    // Recuperar vídeos do usuário
    $user = auth()->user();
    $monetizacao = Monetizacao::where('user_id', $user->id)->first();
    $videosDoUsuario = Video::whereHas('canal', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->get();

    // Verifica se já existe uma entrada na tabela de monetizacao para o usuário ou canal
    $existeMonetizacao = Monetizacao::where('user_id', $user->id)
        ->orWhereIn('canal_id', $user->canal->pluck('id'))
        ->exists();

    if (!$existeMonetizacao) {
        return view('monetizacao_cadastro');
    }

    if ($videosDoUsuario->isEmpty()) {
        return view('monetizacao', [
            'videosDoUsuario' => $videosDoUsuario,
        ]);
    }

    $somaVisualizacoes = $videosDoUsuario->sum('visualizacao');
    
    // Verifica se há uma instância válida de Monetizacao antes de acessar a propriedade
    $valorTotal = $monetizacao ? max(($somaVisualizacoes * 0.15) - ($monetizacao->valor_retirado ?? 0), 0) : 0;
    

    $nomeCanal = $user->canal->nome;

    return view('monetizacao', [
        'videosDoUsuario' => $videosDoUsuario,
        'somaVisualizacoes' => $somaVisualizacoes,
        'valorTotal' => $valorTotal,
        'nomeCanal' => $nomeCanal,
        'valorRetirado' => $monetizacao ? $monetizacao->valor_retirado : 0,
        'valorTodasVisualizacoes' => $somaVisualizacoes * 0.15,
    ]);
}


    public function cadastro(Request $request)
    {
        $user = auth()->user();
        $conta = $request->input('conta');
        $agencia = $request->input('agencia');
        $banco = $request->input('banco');
        $nome = $request->input('nome');
        $cpf = $request->input('cpf');
    
        try {
            $monetizacao = new Monetizacao();
            $monetizacao->user_id = auth()->id();
            $monetizacao->canal_id = auth()->user()->canal->id;
            $monetizacao->conta = $conta;
            $monetizacao->agencia = $agencia;
            $monetizacao->banco = $banco;
            $monetizacao->nome_titular = $nome;
            $monetizacao->cpf = $cpf;
    
            // Salva a monetização no banco de dados
            $monetizacao->save();
            
            $videosDoUsuario = Video::whereHas('canal', function ($query) use ($user) {
    $query->where('user_id', $user->id);
})->get();

            $somaVisualizacoes = $videosDoUsuario->sum('visualizacao');
            $valorTotal = ($somaVisualizacoes * 0.15) - $monetizacao->valor_retirado ?? 0;
            $nomeCanal = $user->canal->nome;
    
            return view('monetizacao', [
                'videosDoUsuario' => $videosDoUsuario,
                'somaVisualizacoes' => $somaVisualizacoes,
                'valorTotal' => $valorTotal,
                'nomeCanal' => $nomeCanal,
                'valorRetirado' => $monetizacao->valor_retirado,
                'valorTodasVisualizacoes' => $somaVisualizacoes * 0.15,
            ]);
        } catch (\Exception $e) {
            // Em caso de erro, volta para o formulário de cadastro com uma mensagem de erro
            $msg = 'Erro ao processar cadastro do canal: ' . $e->getMessage();
            $user = auth()->user();
            $videosDoUsuario = Video::whereHas('canal', function ($query) use ($user) {
    $query->where('user_id', $user->id);
})->get();

            $somaVisualizacoes = $videosDoUsuario->sum('visualizacao');
            $valorTotal = ($somaVisualizacoes * 0.15) - $monetizacao->valor_retirado ?? 0;
            return view('monetizacao', ['msg' => $msg], [
                'videosDoUsuario' => $videosDoUsuario,
                'somaVisualizacoes' => $somaVisualizacoes,
                'valorTotal' => $valorTotal,
                'valorRetirado' => $monetizacao->valor_retirado,
                'valorTodasVisualizacoes' => $somaVisualizacoes * 0.15,
            ]);
        }
    }
    

    public function cadastroView()
    {
        return view('monetizacao_cadastro');
    }

    public function retirarValor()
    {
        $user = auth()->user();
    $monetizacao = Monetizacao::where('user_id', $user->id)->first();

    // Verifica se já existe uma entrada na tabela de monetizacao para o usuário
    if (!$monetizacao) {
        // Se não existir, redirecione para a tela de cadastro de monetização
        return redirect()->route('monetizacao_cadastro')->with('error', 'Você precisa cadastrar a monetização antes de realizar um saque.');
    }else{
        // Calcular o valor a ser retirado (pode ser ajustado conforme sua lógica)
        $videosDoUsuario = Video::whereHas('canal', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        $somaVisualizacoes = $videosDoUsuario->sum('visualizacao');
        $valorARetirar = $somaVisualizacoes * 0.15;
    
        // Se valor_retirado for null, atribuir 0
        $valorRetiradoAtual = $monetizacao->valor_retirado ?? 0;

        if($valorARetirar < $valorRetiradoAtual) {
            return redirect()->back()->with('error', 'Você não possui saldo suficiente para realizar o saque!');
        }

        if($valorARetirar-$monetizacao->valor_retirado == 0) {
            return redirect()->back()->with('error', 'Você não possui saldo suficiente para realizar o saque!');
        }

        $novoValorRetirado = $valorRetiradoAtual + $valorARetirar;

        $monetizacao->update(['valor_retirado' => $novoValorRetirado]);
    }
    
        return redirect()->back()->with('success', 'Valor retirado com sucesso!');
    }
      
}
